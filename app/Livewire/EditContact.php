<?php

namespace App\Livewire;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class EditContact extends Component
{

    use WithPagination;
    public $location;
    public $email;
    public $calls;
    public $contact;


    public function mount(){
        
        $this->location = $this->contact->location;
        $this->email = $this->contact->email;
        $this->calls = $this->contact->call;
    }

    public function update(){
      
        $this->validate([
            'location'=>['required','string'],
            'email'=>['required','email'],
            'calls'=>['required','string'],
           
        ]);



        try{
          

            // insertion
            $this->contact->location = $this->location;
            $this->contact->email = $this->email;
            $this->contact->call = $this->calls;
            $query = $this->contact->save();
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
        return view('livewire.edit-contact');
    }
}
