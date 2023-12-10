<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    public function index(){
        return view("service.list");
    }
    public function create(){
        return view("service.create");
    }
    public function edit(Service $service){
        return view("service.edit",['service' => $service]);
    }
}
