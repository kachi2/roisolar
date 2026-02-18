<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\SolarPackage;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Intervention\Image\Facades\Image;
use App\Traits\imageUpload;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{
    //
     use imageUpload; 




public function uploadImage($request, $path, $width, $height)
{
    $image = $request->file('images'); // single image

    if (!$image) {
        return null;
    }

    $name = $image->getClientOriginalName();
    $fileNameOnly = pathinfo($name, PATHINFO_FILENAME);
    $ext = $image->getClientOriginalExtension();
    $time = time() . '_' . $fileNameOnly;
    $fileName = $time . '.' . $ext;

    Image::make($image)
        ->resize($width, $height)
        ->save(public_path($path . $fileName));

    return $fileName; // return single filename
}



    public function Index(){
        $Package = SolarPackage::all();
        return view('manage.package.index')
        ->with('bheading', 'package Index')
        ->with('breadcrumb', 'Index')
        ->with('package', $Package);
        
    }



     public function Create(){
        return view('manage.package.create')
        ->with('bheading', 'Create Package')
        ->with('breadcrumb', 'Create Package');
    }

public function Store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'images' => 'required|image|mimes:jpg,jpeg,png,webp',
        'price' => 'required|numeric',
        'usage_description' => 'required'
    ]);



     $fileName = null;

    if ($request->file('images')) {
        $uploadedFile = $request->file('images');
        $destinationPath = public_path('images/packages/');
        $fileName = time() . '-' . $uploadedFile->getClientOriginalName();
        $uploadedFile->move($destinationPath, $fileName);
    }
        
        
    // Create project
    $package = SolarPackage::create([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'usage_description' => $request->usage_description,
        'image' => $fileName,
    ]);

 

        Session::flash('alert', 'success');
            Session::flash('message','Package created successfully');
            return redirect()->route('admin.package.index');
}




    public function Edit($id){
        // $hashids = new Hashids('products');
        // $id = $hashids->decode($id);
        $package = SolarPackage::where('id', $id)->first();
        // $package->hashid = $hashids->encode($id);

        return view('manage.package.edit')
        ->with('bheading', 'Edit Package')
        ->with('breadcrumb', 'Edit Package')
        ->with('package', $package);
    }


 public function Update(Request $request, $id){
        
        $package =  SolarPackage::where('id', $id)->first();
        $package->title = $request->title;
        $package->description = $request->description;
        $package->price = $request->price;
        $package->usage_description = $request->usage_description;
        
    if ($request->file('images')) {

    $images = $this->uploadImage($request, 'images/packages/', 800, 600);

        $package->image = $images;
}
           
        if($package->save()){
        Session::flash('alert', 'success');
        Session::flash('message','Package Updated Successfully');
        return back();
     }
        Session::flash('alert', 'error');
        Session::flash('message','Request Failed, something went wrong');
        return back();
    }

    public function Delete($id){
        
        $package = SolarPackage::whereId($id);
        $package->delete();
        Session::flash('alert', 'error');
        Session::flash('message', 'Package Deleted Successfully');
            return redirect()->back();
        }
}
