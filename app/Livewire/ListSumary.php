<?php

namespace App\Livewire;

use App\Models\Sumary;
use Livewire\Component;
use Livewire\WithPagination;

class ListSumary extends Component
{

    use WithPagination;

    public function delete(Sumary $sumary){
        
        $sumary->delete();
        return redirect()->route("sumary")->with("success","sumary was deleted succesfully");

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
        $sumary = Sumary::orderByDesc('id')->paginate(3);
        return view('livewire.list-sumary',compact('sumary'));
    }
}
