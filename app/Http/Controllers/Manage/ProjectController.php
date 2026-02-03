<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hashids\Hashids;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Traits\imageUpload;

class ProjectController extends Controller
{
    //
    use imageUpload;
    public function Index(){
        
       $Project = Project::paginate(10);
        foreach($Project as $Service){
            $hashids = new Hashids('products');
            $Service->hashid = $hashids->encode($Service->id);
        }
        return view('manage.project.index')
        ->with('bheading', 'Project Index')
        ->with('breadcrumb', 'Index')
        ->with('Project', $Project);
        
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
    foreach ($request->file('images') as $image) {
        $path = $image->store('projects', 'public');

        ProjectImage::create([
            'project_id' => $project->id,
            'image_path' => $path
        ]);
    }

    return redirect()->route('admin.project.index')
        ->with('success', 'Project created successfully');
}













}
