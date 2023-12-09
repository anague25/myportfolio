<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(){
        return view("education.list");
    }
    public function create(){
        return view("education.create");
    }
    public function edit(Education $education){
        return view("education.edit",['education' => $education]);
    }
}
