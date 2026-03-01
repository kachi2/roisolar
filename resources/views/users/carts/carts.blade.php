@extends('layouts.app')
@section('title')
<title> Carts Index </title>
@endsection
@section('head')

<link rel="canonical" href="{{ url()->current() }}">
@endsection

  
@section('styles')
<style>


.cart-card {
    border: none;
    border-radius: 15px;
    transition: 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.cart-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

.cart-img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 12px;
}

.summary-card {
    border-radius: 15px;
} 
.product-title {
    font-size: 16px;
    font-weight: 600;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
@media (max-width: 576px) {
    .cart-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
    }

    .card-body {
        gap: 10px;
    }

    .card-body h5 {
        font-size: 14px;
    }

    .card-body h6 {
        font-size: 14px;
    }
}

/* Fix product title layout */
.card-body {
    align-items: center;
    gap: 20px;
}

/* Prevent title from scattering */
.card-body h5 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 5px;

    /* Limit to 2 lines */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;

    word-break: break-word;
}

/* Keep middle content properly sized */
.card-body .flex-grow-1 {
    min-width: 0;
}

/* Prevent right section from pushing content */
.card-body > div:last-child {
    min-width: 90px;
}



/* .cart-wrapper {
  max-width: 800px;
  margin: 40px auto;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(11, 29, 58, 0.15);
  font-family: 'Segoe UI', sans-serif;
}

.cart-wrapper h2 {
  margin-bottom: 20px;
  color: #0b1d3a;
}

.cart-items {
  margin-bottom: 30px;
}

.cart-item {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
  background: white;
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(11, 29, 58, 0.05);
}

.cart-item img {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 8px;
  margin-right: 20px;
} */

/* .item-details {
  flex: 1;
}

.item-details h4 {
  margin: 0 0 8px;
  font-size: 18px;
  color: #0b1d3a;
}

.item-details p {
  margin: 0 0 8px;
  color: #333;
}

.qty input {
  width: 50px;
  padding: 4px;
}

.item-total {
  font-weight: bold;
  color: #0b1d3a;
} */

/* .cart-summary {
  border-top: 1px solid #ddd;
  padding-top: 20px;
}

.summary-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.summary-row.total {
  font-size: 18px;
  border-top: 1px solid #ccc;
  padding-top: 10px;
}

.checkout-btn {
  width: 100%;
  padding: 12px;
  background-color: #007bff;
  color: white;
  font-size: 16px;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  margin-top: 20px;
  transition: background 0.3s ease;
}

.checkout-btn:hover {
  background-color: #0056b3;
}
.cart-item {
  position: relative; 
} */

/* .remove-btn {
  position: absolute;
  top: 8px;
  right: 8px;
  background-color: #dc3545; 
  color: white;
  border: none;
  border-radius: 50%;
  width: 28px;
  height: 28px;
  font-size: 18px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.3s ease;
} */

/* .remove-btn:hover {
  background-color: #b02a37;
} */



/* ===== MOBILE STICKY CART (ICON ONLY) ===== */
.mobile-cart-bar {
    position: fixed;
    bottom: 16px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1050;
}

/* Circular button */
.mobile-cart-link.icon-only {
    position: relative;
    width: 58px;
    height: 58px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(135deg, #0d47a1, #1565c0);
    color: #ffffff;

    border-radius: 50%;
    text-decoration: none;

    box-shadow: 0 12px 32px rgba(13, 71, 161, 0.4);
    transition: all 0.25s ease;
}

/* Cart icon */
.mobile-cart-link.icon-only i {
    font-size: 22px;
}

/* Badge */
.mobile-cart-badge {
    position: absolute;
    top: -14px;
    right: -22px;

    min-width: 22px;
    height: 22px;
    padding: 0 6px;

    background: #f97316;
    color: #ffffff;

    font-size: 12px;
    font-weight: 700;

    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Hover / tap */
.mobile-cart-link.icon-only:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 18px 40px rgba(13, 71, 161, 0.55);
    color: #fff;
}

.mobile-cart-link.cart-text{
  font-size: 14px;
  font-weight: 500;
}

/* Hide on desktop */
@media (min-width: 768px) {
    .mobile-cart-bar {
        display: none;
    }
}
</style>
@endsection

@section('content')

<!-- Mobile Sticky Cart -->
<div class="mobile-cart-bar d-md-none">
    <a href="{{ route('carts.index') }}" class="mobile-cart-link">
    <span class="cart-text">
            View Cart &nbsp;
        </span>
        <i class="icon-cart"></i>

        @php
            $cartCount = collect(session('cart', []))->sum('quantity');
        @endphp

        <span class="mobile-cart-badge">
            {{ $cartCount }}
        </span>
    </a>
</div>
   <!-- ========================
       page title 
    =========================== -->
    <section class="page-title pt-30 pb-30">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-0">
                  <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('users.products') }}">Shop</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb }}</li>
                </ol>
              </nav>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
        </section>
@php
    $totalItems = 0;
    $totalCost = 0;
@endphp

{{-- <div class="cart-wrapper">
  <h4 style="text-align:center;"> Cart</h4> --}}

  <!-- Cart Items -->
  {{-- <div class="cart-items">
    @if(session('cart') && count(session('cart')) > 0) --}}
  {{-- @forelse ($carts as $cart) --}}
    {{-- @forelse (session('cart') as $id => $cart)
    
        @php
            $totalItems += $cart['quantity'];
            $totalCost += $cart['price'] * $cart['quantity'];
            
        @endphp
    <div class="cart-item">
      <img src="{{asset('images/products/'.$cart['image']) }}" alt="Product">
      <div class="item-details">
        <h4>{{$cart['name']}}</h4>
        <p>{{moneyFormat($cart['price'])}}</p>
        <div class="qty">
          Quantity: <input type="number" value="{{$cart['quantity']}}" min="1" disabled>
        </div>

        <form action="{{ route('carts.delete', $id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="remove-btn" title="Remove Item">&times;</button>
        </form> --}}

        
        {{-- <a href="{{route('carts.delete',$carts['id'])}}" class="remove-btn" title="Remove Item">&times;</a> --}}
        
      {{-- </div>
      <div class="item-total">{{ moneyFormat($cart['price'] * $cart['quantity']) }}</div>
    </div>
         @empty
               
        @endforelse
        @else
        <div class="ps-product ps-product--li">
                    <div class="ps-prod" style="border-right:0px">
              <p style="text-align: center"> 
                <i  style="font-size:50px; padding-right:2px; font-weight:800" class="icon-cart-empty"></i> 
                <br> Your cart is empty. <br>
                You have not added any item to your cart.</p> 
                    </div>
                </div>
                @endif


  </div> --}}

  <!-- Summary -->
 
 {{-- @if(session('cart') && count(session('cart')) > 0)

  
  <div class="cart-summary">
  
    <div class="summary-row">
      <span>Total Item:</span>
      <span><b>{{$totalItems}} Items</b></span>
    </div> --}}
    {{-- <div class="summary-row">
      <span>Tax (5%):</span>
      <span>₦2,000</span>
      
    </div> --}}
    {{-- <div class="summary-row total">
      <strong>Total:</strong>
      <strong>{{moneyFormat($totalCost)}}</strong>
     
    </div>
  
    @if(session()->has('cartSession'))
    
   <center> <a href="{{ route('checkout.index', $cartSession) }}"><button class="btn btn-success">Proceed to Checkout</button> </a></center>
  @endif
   </div>
          <a  href="{{route('users.products')}}"><b style="align-text:center;">Continue Shopping</b> </a>
        </div>
  </div>

@endif

</div> --}}




<div class="container my-5">
    <h5 class="text-center fw-bold mb-4">🛒 Shopping Cart</h5>

    @if(session('cart') && count(session('cart')) > 0)

    <div class="row">
        <!-- CART ITEMS -->
        <div class="col-lg-8">
            @php
                $totalItems = 0;
                $totalCost = 0;
            @endphp

            @foreach(session('cart') as $id => $cart)
                @php
                    $totalItems += $cart['quantity'];
                    $totalCost += $cart['price'] * $cart['quantity'];
                @endphp

                <div class="card cart-card mb-3">
                    <div class="card-body d-flex flex-row align-items-center">

                        <img src="{{ asset('images/products/'.$cart['image']) }}"
                             class="cart-img me-md-4 mb-3 mb-md-0">

                        <div class="flex-grow-1 text-center text-md-start">
                            <h5 class="fw-bold mb-1 product-title">
                              {{ \Illuminate\Support\Str::limit($cart['name'], 40) }}
                          </h5>
                            {{-- <p class="text-muted mb-1">{{ moneyFormat($cart['price']) }}</p> --}}
                            <small class="text-secondary">
                                Quantity: {{ $cart['quantity'] }}
                            </small>
                        </div>

                        <div class="text-center text-md-end mt-3 mt-md-0">
                            <h6 class="fw-bold mb-2">
                                {{ moneyFormat($cart['price'] * $cart['quantity']) }}
                            </h6>

                            <form action="{{ route('carts.delete', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    Remove
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- SUMMARY -->
        <div class="col-lg-4">
            <div class="card shadow-sm p-4 summary-card">
                <h5 class="fw-bold mb-3">Order Summary</h5>

                <div class="d-flex justify-content-between mb-2">
                    <span>Total Items</span>
                    <span>{{ $totalItems }}</span>
                </div>

                <div class="d-flex justify-content-between border-top pt-3 mb-3">
                    <strong>Total</strong>
                    <strong>{{ moneyFormat($totalCost) }}</strong>
                </div>

                @if(session()->has('cartSession'))
                    <a href="{{ route('checkout.index', $cartSession) }}"
                       class="btn btn-success w-100 mb-2">
                        Proceed to Checkout
                    </a>
                @endif

                <a href="{{ route('users.products') }}"
                   class="btn btn-outline-dark w-100">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>

    @else

        <div class="text-center py-5">
            <h4 class="mb-3">Your cart is empty 🛒</h4>
            <p class="text-muted">Looks like you haven't added anything yet.</p>
            <a href="{{ route('users.products') }}"
               class="btn btn-primary mt-3">
                Start Shopping
            </a>
        </div>

    @endif
</div>
    
              {{-- </div><!-- /.row --> --}}






@endsection

@section('script')


@endsection