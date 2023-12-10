<?php

namespace App\Livewire;

use Exception;
use App\Models\Mission;
use Livewire\Component;
use App\Models\Experience;
use Livewire\WithPagination;

class EditMission extends Component
{

    use WithPagination;
    public $shortText;
    public $experience;
    public $mission;
   
    public function mount(){
        
        $this->shortText = $this->mission->shortText;
        $this->experience = $this->mission->experience_id;
       
       
    }

    

    public function update(){
      
        $this->validate([
            'shortText'=>['required','string'],
            'experience'=>['required','integer']
            
           
        ]);



        try{
          

            // insertion
            $this->mission->shortText = $this->shortText;
            $this->mission->experience_id = $this->experience;
           
            $query = $this->mission->save();
            if($query){
                return redirect()->route('mission')->with('success','the mission was added successfully');
            }


        }catch(Exception $e)
        {
           dd($e->getMessage());
        }




       
    }
    public function render()
    {
        $experiance = Experience::orderByDesc('id')->get();
        return view('livewire.edit-mission',['experiance'=>$experiance]);
    }
}
