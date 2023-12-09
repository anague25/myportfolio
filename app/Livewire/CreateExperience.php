<?php

namespace App\Livewire;

use App\Models\Experience;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CreateExperience extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $workplace;
    public $job;
    public $year;
    

    

    public function store(Experience $experience){
      
        $this->validate([
            'workplace'=>['required','string'],
            'job'=>['required','string'],
            'year'=>['required','string']
           
        ]);



        try{
          

            // insertion
            $experience->job = $this->job;
            $experience->year = $this->year;
            $experience->workplace = $this->workplace;
           
            $query = $experience->save();
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
        return view('livewire.create-experience');
    }
}
