<?php

namespace App\Livewire;

use Exception;
use App\Models\Sumary;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class EditSumary extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $shortText;
    public $name;
    public $address;
    public $email;
    public $phone;
    public $sumary;


    public function mount(){
        
        $this->shortText = $this->sumary->shortText;
        $this->name = $this->sumary->name;
        $this->phone = $this->sumary->phone;
        $this->address = $this->sumary->address;
        $this->email = $this->sumary->email;
    }

    public function update(){
      
        $this->validate([
            'shortText'=>['required','string'],
            'name'=>['required','string'],
            'phone'=>['required','string'],
            'address'=>['required','string'],
            'email'=>['required','email']
        ]);



        try{
          

            // insertion
            $this->sumary->shortText = $this->shortText;
            $this->sumary->name = $this->name;
            $this->sumary->phone = $this->phone;
            $this->sumary->email = $this->email;
            $this->sumary->address = $this->address;
            $query =  $this->sumary->save();
            if($query){
                return redirect()->route('sumary')->with('success','the sumary was added successfully');
            }


        }catch(Exception $e)
        {
           dd($e->getMessage());
        }




       
    }
    public function render()
    {
        return view('livewire.edit-sumary');
    }
}
