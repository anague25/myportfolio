<?php

namespace App\Livewire;

use Exception;
use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class CreateContact extends Component
{

    use WithPagination;
    public $location;
    public $email;
    public $calls;

    public function store(Contact $contact){
      
        $this->validate([
            'location'=>['required','string'],
            'email'=>['required','email'],
            'calls'=>['required','string'],
           
        ]);



        try{
          

            // insertion
            $contact->location = $this->location;
            $contact->email = $this->email;
            $contact->call = $this->calls;
            $query = $contact->save();
            if($query){
                return redirect()->route('contact')->with('success','the contact was added successfully');
            }


        }catch(Exception $e)
        {
           dd($e->getMessage());
        }




       
    }
    
    public function render()
    {
        return view('livewire.create-contact');
    }
}
