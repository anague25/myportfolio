<?php

namespace App\Http\Controllers;

use App\Models\Sumary;
use Illuminate\Http\Request;

class SumaryController extends Controller
{
    public function index(){
        return view("sumary.list");
    }
    public function create(){
        return view("sumary.create");
    }
    public function edit(Sumary $sumary){
        return view("sumary.edit",['sumary' => $sumary]);
    }
}
