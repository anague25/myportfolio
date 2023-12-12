<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class ListMessage extends Component
{

    public function delete(Message $message){
        
        $message->delete();
        return redirect()->route("message")->with("success","message was deleted succesfully");

    }

   
    public function render()
    {
         $message = Message::orderByDesc('id')->paginate(3);
        return view('livewire.list-message', compact('message'));
    }
}
