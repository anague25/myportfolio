<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class Herocontroller extends Controller
{
    public function index(){
        return view("heroes.list");
    }
    public function create(){
        return view("heroes.create");
    }
    public function edit(Hero $heroes){
        return view("heroes.list",compact('heroes'));
    }
}
