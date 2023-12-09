<?php

namespace App\Livewire;

use App\Models\Experience;
use Livewire\Component;
use Livewire\WithPagination;

class ListExperience extends Component
{

    use WithPagination;

    public function delete(Experience $experience){
        
        $experience->delete();
        return redirect()->route("experience")->with("success","experience was deleted succesfully");

    }

    // public function toggleStatus(Sumary $sumary){
    //     if($sumary->active == '0'){
    //         Sumary::where('active','0')->update(['active'=> '0']);
    //         $sumary->active = '1';
    //         $sumary->save();
    //         return;

    //     }elseif($sumary->active == '1'){
    //         Sumary::where('id',$sumary->id)->update(['active'=> '0']);
    //         return;
    //     }
    // }

   
    public function render()
    {
        $experience = Experience::orderByDesc('id')->paginate(3);
        return view('livewire.list-experience',compact('experience'));
    }
}
