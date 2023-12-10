<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mission;
use Livewire\WithPagination;

class ListMission extends Component
{
    
    

    use WithPagination;

    public function delete(Mission $mission){
        
        $mission->delete();
        return redirect()->route("mission")->with("success","mission was deleted succesfully");

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
        $mission = Mission::orderByDesc('id')->paginate(3);
        return view('livewire.list-mission',compact('mission'));
    }
}
