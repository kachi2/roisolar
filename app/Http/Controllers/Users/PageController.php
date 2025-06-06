<?php

namespace App\Http\Controllers\Users;

use App\Models\Blog;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Category;
use App\Models\Services;
use App\Models\Privacypolicy;
use App\Models\TermsCondition;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;


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
        ->with('aboutUs', AboutUs::latest()->first());
    }

    public function contactUs(){
        return view('users.pages.contactUs');
    }

    public function products(){
       
         return view('users.pages.products', [
        'products' => product::all(),
        'categories' => Category::all(),
        
    ]);

        
    }

    public function ProductDetails($id){
        // $latest =  Product::latest()->simplePaginate(6);
        // foreach($latest as $bb){
        //     $bb->hashid = Hashids::connection('category')->encode($bb->id);
        // }
        // $id = Hashids::connection('category')->decode($id);
        // $products = Product::findorfail($id[0]);
    return view('users.pages.product_details')
    ->with('product', Product::where('id', decrypt($id))->first())
    ->with('products', Product::all());
    

    }

    
    public function productsByCategory($id)
        {
            $category = Category::where('id',$id)->firstOrFail();
            $product = $category->products()->get(); // or ->get()
            $cate = Category::all();
            $currentCategory = $category;
            return view('users.pages.product_category', compact('category', 'product', 'cate','currentCategory'));
        }

    

    public function services(){
        return view('users.pages.services')
        ->with('services', Services::paginate(6));
        // ->with('settings', Settings::first());
    }

    public function ServiceDetails($id)
    {
        return view('users.pages.service_details')
        ->with('service', Services::where('id', decrypt($id))->first())
        ->with('se', Services::latest()->simplePaginate(6));
        
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
