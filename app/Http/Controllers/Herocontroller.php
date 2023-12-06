<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Herocontroller extends Controller
{
    public function index(){
        return view("heroes.list");
    }
}
