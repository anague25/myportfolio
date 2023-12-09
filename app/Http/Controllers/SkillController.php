<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(){
        return view("skill.list");
    }
    public function create(){
        return view("skill.create");
    }
    public function edit(Skill $skills){
        return view("skill.edit",['skills' => $skills]);
    }
}
