<?php

namespace App\Livewire;

use App\Models\Hero;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ListHero extends Component
{
    use WithFileUploads;
    

    public function delete(Hero $heroes){
        if($heroes->img){
            Storage::disk('public')->delete($heroes->img);
        }
        $heroes->delete();
        return redirect()->route("portfolio")->with("success","profile was deleted succesfully");

    }

    public function toggleStatus(Hero $heroes){
        if($heroes->active == '0'){
            Hero::where('active','0')->update(['active'=> '0']);
            $heroes->active = '1';
            $heroes->save();
            return;

        }elseif($heroes->active == '1'){
            Hero::where('id',$heroes->id)->update(['active'=> '0']);
            return;
        }
    }

    public function render()
    {
        $heroes = Hero::orderByDesc('id')->paginate(3);

        return view('livewire.list-hero', compact('heroes'));
    }
}
