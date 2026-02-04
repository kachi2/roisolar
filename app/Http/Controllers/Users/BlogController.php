<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Vinkla\Hashids\Facades\Hashids;

class BlogController extends Controller
{
    public function Index(){
    
        $blogs =  Blog::latest()->get();
        $category = Category::All();
        foreach($blogs as $Blog){
            $Blog->hashid = Hashids::connection('products')->encode($Blog->id);
        }
        return view('users.pages.blogs')->with('blogs',$blogs)
        ->with('categories',$category);
    }

    // public function BlogDetails($id){
    //     // $latest =  Blog::latest()->get();
    //     // foreach($latest as $bb){
    //     //     $bb->hashid = Hashids::connection('products')->encode($bb->id);
    //     // }
    //     // $id = Hashids::connection('products')->decode($id);
    //     // $blogs = Blog::findorfail($id);
    // return view('users.pages.blog_details')
    // ->with('blog', Blog::where('id', decrypt($id))->first())
    // ->with('blogs', Blog::latest()->simplePaginate(4));
    
    // }

    public function BlogDetails($id)
{
    $decoded = Hashids::decode($id);

    abort_if(empty($decoded), 404);

    $blog = Blog::findOrFail($decoded[0]);

    $latestBlogs = Blog::latest()
        ->where('id', '!=', $blog->id)
        ->limit(5)
        ->get();

    return view('users.pages.blog_details', compact('blog', 'latestBlogs'));
}


}
