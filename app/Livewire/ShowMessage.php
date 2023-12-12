<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class ShowMessage extends Component
{

    public $message;
    public function render()
    {
        $message = Message::findOrFail($this->message->id);
        // dd($message);

        return view('livewire.show-message',compact('message'));
    }
}
