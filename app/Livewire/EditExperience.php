<?php

namespace App\Livewire;

use Exception;
use Livewire\Component;
use App\Models\Experience;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class EditExperience extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $workplace;
    public $job;
    public $year;
    
    public $experience;


    public function mount(){
        
        $this->workplace = $this->experience->workplace;
        $this->job = $this->experience->job;
        $this->year = $this->experience->year;
       
    }

    public function update(){
      
        $this->validate([
            'workplace'=>['required','string'],
            'job'=>['required','string'],
            'year'=>['required','string']
        ]);



        try{
          

            // insertion
            $this->experience->workplace = $this->workplace;
            $this->experience->job = $this->job;
            $this->experience->year = $this->year;
           
            $query =  $this->experience->save();
            if($query){
                return redirect()->route('experience')->with('success','the experience was added successfully');
            }


        }catch(Exception $e)
        {
           dd($e->getMessage());
        }




       
    }

    
    public function render()
    {
        return view('livewire.edit-experience');
    }
}
