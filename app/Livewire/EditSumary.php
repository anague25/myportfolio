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


    public function mount(){
        
        $this->shortText = $this->skills->shortText;
        $this->name = $this->skills->name;
        $this->phone = $this->skills->phone;
        $this->address = $this->skills->address;
        $this->email = $this->skills->email;
    }

    public function store(Sumary $sumary){
      
        $this->validate([
            'shortText'=>['required','string'],
            'name'=>['required','string'],
            'phone'=>['required','string'],
            'address'=>['required','string'],
            'email'=>['required','email']
        ]);



        try{
          

            // insertion
            $sumary->shortText = $this->shortText;
            $sumary->name = $this->name;
            $sumary->phone = $this->phone;
            $sumary->email = $this->email;
            $sumary->address = $this->address;
            $query =  $sumary->save();
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
