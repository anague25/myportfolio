<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(){
        return view("testimonial.list");
    }
    public function create(){
        return view("testimonial.create");
    }
    public function edit(Testimonial $testimonial){
        return view("testimonial.edit",['testimonial' => $testimonial]);
    }
}
