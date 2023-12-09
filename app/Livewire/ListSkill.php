<?php

namespace App\Livewire;

use App\Models\Skill;
use Livewire\Component;
use Livewire\WithPagination;

class ListSkill extends Component
{
    use WithPagination;

    public function delete(Skill $skills){
        
        $skills->delete();
        return redirect()->route("skill")->with("success","skill was deleted succesfully");

    }

    public function toggleStatus(Skill $skills){
        if($skills->active == '0'){
            Skill::where('active','0')->update(['active'=> '0']);
            $skills->active = '1';
            $skills->save();
            return;

        }elseif($skills->active == '1'){
            Skill::where('id',$skills->id)->update(['active'=> '0']);
            return;
        }
    }

   
    public function render()
    {
        $skills = Skill::orderByDesc('id')->paginate(3);
        return view('livewire.list-skill',compact('skills'));
    }
}
