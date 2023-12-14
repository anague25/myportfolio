<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return view("project.list");
    }
    public function create(){
        return view("project.create");
    }
    public function show(Project $portfolio){
        return view("project.show",compact("portfolio"));
    }
    public function edit(Project $project){
        return view("project.edit",['project' => $project]);
    }
}
