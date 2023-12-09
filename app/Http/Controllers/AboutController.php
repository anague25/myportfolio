<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view("about.list");
    }
    public function create(){
        return view("about.create");
    }
    public function edit(About $about){
        return view("about.edit",['about' => $about]);
    }
}
