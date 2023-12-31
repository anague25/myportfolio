<?php

namespace App\Livewire;

use Exception;
use Livewire\Component;
use App\Models\Education;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class EditEducation extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $degree;
    public $shoolPlace;
    public $year;
    public $shortText;
    public $education;


    public function mount(){
        
        $this->degree = $this->education->degree;
        $this->shoolPlace = $this->education->shoolPlace;
        $this->year = $this->education->year;
        $this->shortText = $this->education->shortText;
       
    }
    public function update(){
      
        $this->validate([
            'shortText'=>['required','string'],
            'year'=>['required','string'],
            'degree'=>['required','string'],
            'shoolPlace'=>['required','string'],
        ]);



        try{
          

            // insertion
            $this->education->shortText = $this->shortText;
            $this->education->year = $this->year;
            $this->education->degree = $this->degree;
            $this->education->shoolPlace = $this->shoolPlace;
           
            $query = $this->education->save();
            if($query){
                return redirect()->route('education')->with('success','education was added successfully');
            }


        }catch(Exception $e)
        {
           dd($e->getMessage());
        }




       
    }
    public function render()
    {
        return view('livewire.edit-education');
    }
}
