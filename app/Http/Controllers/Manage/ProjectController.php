<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Hashids\Hashids;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Traits\imageUpload;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    //
    use imageUpload;
    public function Index(){
        $Project = Project::with('images')->paginate(10);

    //    $Project = Project::paginate(10);
        foreach($Project as $proj){
            $hashids = new Hashids('products');
            $proj->hashid = $hashids->encode($proj->id);
        }
        return view('manage.project.index')
        ->with('bheading', 'Project Index')
        ->with('breadcrumb', 'Index')
        ->with('Project', $Project);
        
    }

public function UploadImages($request, $folder, $width = null, $height = null)
{
    $paths = [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {

            $name = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $path = public_path($folder);

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            // If you use Intervention Image
            if ($width && $height) {
                Image::make($file)
                    ->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save($path.$name);
            } else {
                $file->move($path, $name);
            }

            $paths[] = $folder.$name;
        }
    }

    return $paths;
}


     public function Create(){
        return view('manage.project.create')
        ->with('bheading', 'Create Project')
        ->with('breadcrumb', 'Create Project');
    }

public function Store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'images.*' => 'required|image|mimes:jpg,jpeg,png,webp'
    ]);

    // Create project
    $project = Project::create([
        'title' => $request->title,
        'description' => $request->description,
        'slug' => Str::slug($request->title) . '-' . time()
    ]);

    // Store images
    // foreach ($request->file('images') as $image) {
    //     $path = $image->store('projects', 'public');

    //     ProjectImage::create([
    //         'project_id' => $project->id,
    //         'image_path' => $path
    //     ]);
    // }

    if ($request->file('images')) {

    $images = $this->UploadImages($request, 'images/projects/', 800, 600);

    foreach ($images as $img) {
        ProjectImage::create([
            'project_id' => $project->id,
            'image_path' => $img
        ]);
    }
}


    return redirect()->route('admin.project.index')
        ->with('success', 'Project created successfully');
}




    public function Edit($id){
        $hashids = new Hashids('products');
        $id = $hashids->decode($id);
        $project = Project::where('id', $id)->first();
        $project->hashid = $hashids->encode($id);

        return view('manage.project.edit')
        ->with('bheading', 'Edit project')
        ->with('breadcrumb', 'Edit project')
        ->with('project', $project);
    }


 public function Update(Request $request, $id){
        $hashids = new Hashids('products');
        $id = $hashids->decode($id);
        $project =  Project::where('id', $id)->first();
        $project->title = $request->title;
        $project->description = $request->content;
        
//        if ($request->hasFile('images')) {

//     foreach ($request->file('images') as $image) {

//         // Store image
//         $path = $image->store('projects', 'public');

//         // Save to project_images table
//         ProjectImage::create([
//             'project_id' => $project->id,
//             'image_path' => $path
//         ]);
//     }
// }
    if ($request->file('images')) {

    $images = $this->UploadImages($request, 'images/projects/', 800, 600);

    foreach ($images as $img) {
        ProjectImage::create([
            'project_id' => $project->id,
            'image_path' => $img
        ]);
    }
}
           
        if($project->save()){
        Session::flash('alert', 'success');
        Session::flash('message','Service Updated Successfully');
        return back();
     }
        Session::flash('alert', 'error');
        Session::flash('message','Request Failed, something went wrong');
        return back();
    }

    public function Delete($id){
        $hashids = new Hashids('products');
        $id = $hashids->decode($id);
        $project = Project::whereId($id);
        $project->delete();
        Session::flash('alert', 'error');
        Session::flash('message', 'Service Deleted Successfully');
            return redirect()->back();
        }





}
