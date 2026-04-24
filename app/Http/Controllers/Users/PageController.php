<?php

namespace App\Http\Controllers\Users;

use App\Models\Blog;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Category;
use App\Models\Services;
use App\Models\Privacypolicy;
use App\Models\TermsCondition;
use App\Models\SolarPackage;
use App\Models\ContactUs;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class PageController extends Controller
{
    public function privacypolicy(){
        $privacypolicy = Privacypolicy::first();
        return  view('users.pages.privacy')
        ->with('policy', $privacypolicy);
    }

    public function Terms(){
        $termscondition = TermsCondition::first();
        return  view('users.pages.terms')
        ->with('terms', $termscondition);
    }

    public function aboutUs(){
        return  view('users.pages.aboutUs')
        ->with('aboutUs', AboutUs::latest()->first())
        ->with('categories', Category::all());
    }

    public function contactUs(){
        return view('users.pages.contactUs', [
    'categories' => Category::all()
    ]);
    }

    public function ContactStore(Request $request){
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        ContactUs::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', "Message sent! We'll get back to you soon.");
    }



    public function products(){
       
         return view('users.pages.products', [
        'products'   => Product::where('status', 0)->get(),
        'categories' => Category::all(),
        // 'latest' => Product::latest()->simplePaginate(4)
        'latest' => Product::where('status', 0)->latest()->simplePaginate(4)

        
    ]);

        
    }

    public function ProductDetails($slug){
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        return view('users.pages.product_details')
            ->with('product', $product)
            ->with('prod', $product)
            ->with('products', Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->latest()->take(8)->get());
    }

    
    public function productsByCategory($id)
        {
            $category = Category::where('id',$id)->firstOrFail();
            // $product = $category->products()->get(); // or ->get()
            $product = $category->products()
            ->where('status', 0)
            ->get();
            $cate = Category::all();
            $currentCategory = $category;
            // $latest =  Product::latest()->simplePaginate(4);
            $latest = Product::where('status', 0)
            ->latest()
            ->simplePaginate(4);

            return view('users.pages.product_category', compact('category', 'product', 'cate','currentCategory', 'latest'));
        }



    public function search(Request $request)
            {
        $query = $request->input('query'); 

        // If search box is empty
        if (!$query) {
            return redirect()->back()->with('error', 'Please enter a product name to search.');
    }

    $latest =  Product::latest()->simplePaginate(4);
    // Perform the search using Eloquent
    $products = Product::where('name', 'LIKE', "%{$query}%")
                // ->orWhere('description', 'LIKE', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->paginate(12);

    // Optional: fetch categories for sidebar if needed
    $categories = Category::all();

    return view('users.pages.productsSearch', compact('products', 'query', 'categories', 'latest'));
}

    

    public function services(){
        return view('users.pages.services')
        // ->with('services', Services::paginate(5))
        ->with('services', Services::all())
        ->with('categories', Category::all());
        // ->with('settings', Settings::first());
    }

    public function ServiceDetails($slug)
    {
        return view('users.pages.service_details')
        ->with('service', Services::where('slug', $slug)->firstOrFail())
        ->with('se', Services::latest()->get())
        ->with('categories', Category::all());
    }

    public function Packages()
    {
     $package = SolarPackage::where('is_active', true)->latest()->get();

    return view('users.pages.packages', compact('package'));
        
    }


    public function PackageDetails($id)
    {
        return view('users.pages.package_details');
        
        
    }

   
//     public function Products()
// {
//     return view('users.pages.products', [
//         'categories' => Category::all(),
//         'products' => Product::all(),
//         'currentCategory' => null
//     ]);
// }

// public function productsByCategory($id)
// {
//     $category = Category::where('category_id', $id)->firstOrFail();
//     return view('users.pages.products', [
//         'categories' => Category::all(),
//         'products' => Product::where('category_id', $category->id)->paginate(9),
//         'currentCategory' => $category
//     ]);
// }


}
