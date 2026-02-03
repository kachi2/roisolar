<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function Project(){
      return view('users.pages.projects', [
        'projects' => Project::with('images')->latest()->get(),
        'latest' => Project::with('images')->latest()->simplePaginate(4),
        
    ]);

}


public function ProjectDetails($slug)
{
    $project = Project::where('slug', $slug)
        ->with('images')
        ->firstOrFail();

        $latestProjects = Project::with('images')
        ->where('id', '!=', $project->id)
        ->latest()
        ->take(4)
        ->get();


    return view('users.pages.project_details', compact('project', 'latestProjects'));
   
}




}