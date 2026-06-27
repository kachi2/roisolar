<?php

namespace App\Http\Controllers\Users;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\RegMail;
use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\CartItemsEvent;
use App\Services\RegisterUser;
use App\Models\CountryCurrency;
use App\Models\ShippingAddress;
use App\Models\ShipmentLocation;
use App\Traits\CalculateShipping;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Unicodeveloper\Paystack\Facades\Paystack;


class CheckoutController extends Controller
{
    use CalculateShipping;
 
    //

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function Index($cartSession = null){
 if (!Auth::check()) {
    return redirect()->route('login');
}
        // if(count(Cart::content()) <= 0 || empty(Cart::content())){
        //     return redirect()->intended(route('users.index'));
        // }

         $cart = session()->get('cart', []); // get cart from session

    if (empty($cart)) {
        return redirect()->route('users.index')->with('error', 'Your cart is empty');
    }

    // return view('users.carts.checkout', compact('cart'));

        
        // $userData =   getUserLocationData();
        // dd($userData);

            // $country = $userData['country'] ?? null;

            
                $currency = CountryCurrency::where('currency', 'NGN')->first();
            //  dd($currency);

        

        $addresses = ShippingAddress::where('user_id', Auth::id())->get();

        if($addresses->isEmpty()){
            return redirect()->route('createAddress')->with('msg', 'Please add a shipping address to continue checkout.');
        }

        // pick default if exists, else latest one
        $address = $addresses->firstWhere('is_default', true) ?? $addresses->last();
        $defaultAddressId = $address->id;
        if($currency){
            if($currency['country'] == "NG" && Str::contains(strtolower($address->address), 'lagos')){
                $shipping_fee = '8000';
            }else{
                $shipping_fee = $currency['shipping_fee']; 
          }
        }else {
            $shipping_fee = '6500';
          }

      
        // $carts = Cart::content();
         $carts = session()->get('cart', []);
        $orderNo = rand(111111111,999999999);
//  dd($carts);
        if(!isset($address)){
            Session::flash('alert', 'error');
            Session::flash('msg', 'Please add a shipping address before you can proceed');
            return redirect()->intended(route('users.account.address'));
        }
    
       

        $cart = Hashids::connection('products')->decode($cartSession); 
        // $check = CartItem::where(['user_id' => auth_user()->id, 'cartSession' => $cart[0]])->first();
        $cart = session('cart');

if (!$cart || empty($cart)) {
    return response()->json([
        'status' => 'error',
        'message' => 'Cart is empty'
    ]);
}

$cartSession = session()->getId();

$check = CartItem::where([
    'user_id' => auth()->id(),
    'cartSession' => $cartSession
])->first();

        if(!isset($check) || empty($check)){
            event(new CartItemsEvent($carts, $orderNo, $cartSession));
        }
         $date['start'] = Carbon::now();
         $date['end'] = Carbon::now()->addDay(1);

        return view('users.carts.checkout', $date)
        ->with('carts', $carts)
        ->with('cart', $cart)
        ->with('address', $address)
        ->with('defaultAddressId', $defaultAddressId)
        ->with('orderNo', $orderNo)
        ->with('shipping_fee',  $shipping_fee);

          
    }


public function process(Request $request)
{
    $cart = session('cart');

    if (!$cart || count($cart) === 0) {
        return back()->with('error', 'Your cart is empty.');
    }

    // Validate required fields
    $request->validate([
        'payment_method' => 'required|in:delivery,card,bank',
        'address_id'     => 'required|exists:shipping_addresses,id',
    ]);

    // Calculate totals
    $shipping_fee = 8000;
    $totalCost = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    $grandTotal = $totalCost + $shipping_fee;

    // Generate order number
    $orderNo = 'ORD-' . strtoupper(uniqid());

    /*
    |--------------------------------------------------------------------------
    | 🚚 HOME DELIVERY
    |--------------------------------------------------------------------------
    */
    if ($request->payment_method === 'delivery') {

        $order = Order::create([
            'user_id'        => Auth::id(),
            'order_no'       => $orderNo,
            'cart_items'     => json_encode($cart),
            'payment_method' => 'delivery',
            'payable'        => $grandTotal,
            'status'         => 'pending',
            'channel'        => 'Home Delivery',
            'address_id'     => $request->address_id,
        ]);

        foreach ($cart as $item) {
            CartItem::create([
                'order_no'     => $orderNo,
                'product_id'   => $item['rowId'],
                'product_name' => $item['name'],
                'qty'          => $item['quantity'],
                'price'        => $item['price'],
                'payable'      => $item['price'] * $item['quantity'],
                'user_id'      => Auth::id(),
                'image'        => $item['image'] ?? null,
            ]);
        }

        Session::forget('cart');

         $success = "Your order has been placed. Please complete the bank transfer.";
             Session::forget('cart');
            return view('users.carts.success')
            ->with('success', $success);
    }

    /*
    |--------------------------------------------------------------------------
    | 💳 CARD PAYMENT (PAYSTACK)
    |--------------------------------------------------------------------------
    */
    if ($request->payment_method === 'card') {

        if (!$request->reference) {
            return back()->with('error', 'Payment reference missing.');
        }

        $verify = Http::withToken(config('paystack.secretKey'))
            ->get("https://api.paystack.co/transaction/verify/{$request->reference}")
            ->json();

        if (!$verify['status'] || $verify['data']['status'] !== 'success') {
            return back()->with('error', 'Payment verification failed.');
        }

        // Confirm amount matches
        if (($verify['data']['amount'] / 100) != $grandTotal) {
            return back()->with('error', 'Payment amount mismatch.');
        }

        $order = Order::create([
            'user_id'        => Auth::id(),
            'order_no'       => $orderNo,
            'cart_items'     => json_encode($cart),
            'payment_method' => 'card',
            'payable'        => $grandTotal,
            'status'         => 'paid',
            'channel'        => 'Paystack',
            'transaction_ref'=> $request->reference,
            'address_id'     => $request->address_id,
        ]);

        foreach ($cart as $item) {
            CartItem::create([
                'order_no'     => $orderNo,
                'product_id'   => $item['rowId'],
                'product_name' => $item['name'],
                'qty'          => $item['quantity'],
                'price'        => $item['price'],
                'payable'      => $item['price'] * $item['quantity'],
                'user_id'      => Auth::id(),
                'image'        => $item['image'] ?? null,
            ]);
        }

        Session::forget('cart');

       $success = "Your order has been placed. Please complete the bank transfer.";
             Session::forget('cart');
            return view('users.carts.success')
            ->with('success', $success);
    }

    /*
    |--------------------------------------------------------------------------
    | 🏦 BANK TRANSFER
    |--------------------------------------------------------------------------
    */
    if ($request->payment_method === 'bank') {

        $order = Order::create([
            'user_id'        => Auth::id(),
            'order_no'       => $orderNo,
            'cart_items'     => json_encode($cart),
            'payment_method' => 'bank',
            'payable'        => $grandTotal,
            'status'         => 'pending',
            'channel'        => 'Bank Transfer',
            'address_id'     => $request->address_id,
        ]);

        foreach ($cart as $item) {
            CartItem::create([
                'order_no'     => $orderNo,
                'product_id'   => $item['rowId'],
                'product_name' => $item['name'],
                'qty'          => $item['quantity'],
                'price'        => $item['price'],
                'payable'      => $item['price'] * $item['quantity'],
                'user_id'      => Auth::id(),
                'image'        => $item['image'] ?? null,
            ]);
        }

        Session::forget('cart');

         $success = "Your order has been placed. Please complete the bank transfer.";
             Session::forget('cart');
            return view('users.carts.success')
            ->with('success', $success);
    }

    return back()->with('error', 'Invalid payment method.');

}
    public function success()
    {
        return view('users.carts.success');
    }



    
}
