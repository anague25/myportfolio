<?php

namespace App\Livewire;

use App\Models\Skill;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CreateSkill extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $shortText;
    public $skillName;
    public $percentage;

    public function store(Skill $skill){
      
        $this->validate([
            'shortText'=>['required','string'],
            'skillName'=>['required','string'],
            'percentage'=>['required','integer']
            
        ]);



        try{
          

            // insertion
            $skill->shortText = $this->shortText;
            $skill->skillName = $this->skillName;
            $skill->percentage = $this->percentage;
            $query =  $skill->save();
            if($query){
                return redirect()->route('skill')->with('success','the skill was added successfully');
            }


        }catch(\Exception $e)
        {
           dd($e->getMessage());
        }




       
    }

    
    public function render()
    {
        return view('livewire.create-skill');
    }
}
