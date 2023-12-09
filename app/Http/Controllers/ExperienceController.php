<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index(){
        return view("experience.list");
    }
    public function create(){
        return view("experience.create");
    }
    public function edit(Experience $experience){
        return view("experience.edit",['experience' => $experience]);
    }
}
