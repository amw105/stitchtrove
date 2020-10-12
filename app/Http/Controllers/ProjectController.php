<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Imports\ProjectImport;
use Maatwebsite\Excel\Facades\Excel;
class ProjectController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $projects = Project::all();
        return view('projects.list', compact('projects', $projects));
    }

    public function import() 
    {
        Excel::import(new ProjectImport, 'storage/imports/projects.csv');
        dd('all good');
        return redirect('/')->with('success', 'All good!');
    }
}
