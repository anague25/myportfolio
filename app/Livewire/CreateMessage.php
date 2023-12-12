<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use App\Mail\MessageMail;
use Illuminate\Support\Facades\Mail;


class CreateMessage extends Component
{
    public $message;
    public $name;
    public $email;
    public $subject;
    
    public function store(Message $message){
        
        $this->validate([
            "name"=> "required|string",
            "subject"=> "required|string",
            "email"=> "required|email",
            "message"=> "required|string",
        ]);

        $data = [
            "name" => $this->name,
            "subject" => $this->subject,
            "email" => $this->email,
            "message" => $this->message 
        ];
        Mail::to('anaguesonnaroosvelt@gmail.com')->send(new MessageMail($data));

      
        $message->name = trim($this->name);
        $message->subject =trim($this->subject);
        $message->message = trim($this->message);
        $message->email = trim($this->email);
        $message->save();
        // dd($message);


      

        return redirect()->back()->with('success','The message had been send succeessfuly');
    }
    public function render()
    {
        return view('livewire.create-message');
    }
}
