<?php

namespace App\Livewire;

use App\Models\Education;
use Livewire\Component;
use Livewire\WithPagination;

class ListEducation extends Component
{
    

    use WithPagination;

    public function delete(Education $education){
        
        $education->delete();
        return redirect()->route("education")->with("success","education was deleted succesfully");

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
        $education = Education::orderByDesc('id')->paginate(3);
        return view('livewire.list-education',compact('education'));
    }
}
