<?php

namespace App\Livewire;

use Exception;
use App\Models\Skill;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class EditSkill extends Component
{


    use WithFileUploads;
    use WithPagination;
    public $shortText;
    public $skillName;
    public $percentage;
    public $skills;


    public function mount(){
        
        $this->shortText = $this->skills->shortText;
        $this->skillName = $this->skills->skillName;
        $this->percentage = $this->skills->percentage;
    }
    public function update(){
      
        $this->validate([
            'shortText'=>['required','string'],
            'skillName'=>['required','string'],
            'percentage'=>['required','integer']
            
        ]);



        try{
          

            // insertion
            $this->skills->shortText = $this->shortText;
            $this->skills->skillName = $this->skillName;
            $this->skills->percentage = $this->percentage;
            $query =  $this->skills->save();
            if($query){
                return redirect()->route('skill')->with('success','the skill was updated successfully');
            }


        }catch(Exception $e)
        {
           dd($e->getMessage());
        }




       
    }
    public function render()
    {
        return view('livewire.edit-skill');
    }
}
