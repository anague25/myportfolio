<?php

namespace App\Livewire;

use Exception;
use App\Models\Mission;
use Livewire\Component;
use App\Models\Experience;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CreateMission extends Component
{


    use WithFileUploads;
    use WithPagination;
    public $shortText;
    public $experience;
   
    

    

    public function store(Mission $mission){
      
        $this->validate([
            'shortText'=>['required','string'],
            'experience'=>['required','integer']
            
           
        ]);



        try{
          

            // insertion
            $mission->shortText = $this->shortText;
            $mission->experience_id = $this->experience;
           
            $query = $mission->save();
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

        // $experience = Experience::orderByDesc('id')->get();
        // dd($experience);
    return view('livewire.create-mission',['experiance'=>$experiance]);
    }
}
