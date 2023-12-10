<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index(){
        return view("experience.list");
    }
    public function create(){
        return view("experience.create");
    }
    public function edit(Mission $mission){
        return view("mission.edit",['mission' => $mission]);
    }
}
