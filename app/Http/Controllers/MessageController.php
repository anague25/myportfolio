<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\MessageMail;

class MessageController extends Controller
{
    public function index(){
        return view("message.list",compact('message'));
    }
    public function create(){
        return view("message.create");
    }
    
   
    public function edit(Message $message){
        return view("message.edit",['message' => $message]);
    }
}
