<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class FindController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('find.index');
    }


    public function compare(Request $request)
    {
        $floss_array = explode(',',$request['floss']);
        $all_projects = Project::all('id', 'threads');
        $fullarray = [];
        $nearlyarray = [];
        

        foreach ($all_projects as $project){
            $project_floss = str_replace('|',',', $project['threads']);
            
            $project_floss = json_decode($project_floss);
            $matches = array_intersect($floss_array,$project_floss);
            $a = round(count($matches));
            $b = count($project_floss);
            $similarity = round($a/$b*100);
            if($similarity == 100){
                array_push($fullarray, $project['id']);
            }
            if($similarity > 90 && $similarity < 100){
                array_push($nearlyarray, $project['id']);
            }
        }
        $fullprojects = Project::whereIn('id', $fullarray)->get();
        $nearlyprojects = Project::whereIn('id', $nearlyarray)->get();
        return view('find.results', compact(['fullprojects',$fullprojects], ['nearlyprojects', $nearlyprojects]));
    }
}
