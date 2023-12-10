<?php

namespace App\Livewire;

use App\Models\Education;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CreateEducation extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $degree;
    public $shoolPlace;
    public $year;
    public $shortText;

    public function store(Education $education){
      
        $this->validate([
            'shortText'=>['required','string'],
            'year'=>['required','string'],
            'degree'=>['required','string'],
            'shoolPlace'=>['required','string'],
        ]);



        try{
          

            // insertion
            $education->shortText = $this->shortText;
            $education->year = $this->year;
            $education->degree = $this->degree;
            $education->shoolPlace = $this->shoolPlace;
           
            $query =  $education->save();
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
        return view('livewire.create-education');
    }
}
