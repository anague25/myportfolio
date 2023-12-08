<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(){
        return view("social.list");
    }
    public function create(){
        return view("social.create");
    }
    public function edit(Social $social){
       $socials = Social::findOrfail($social->id);
        return view("social.edit",['socials'=>$socials]);
    }
}
