<?php

namespace App\Livewire;

use App\Models\Social;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ListSocial extends Component
{

    use WithFileUploads;
    

    public function delete(Social $social){
        if($social->icon){
            Storage::disk('public')->delete($social->icon);
        }
        $social->delete();
        return redirect()->route("social")->with("success","social network was deleted succesfully");

    }

    public function toggleStatus(Social $social){
        if($social->active == '0'){
            Social::where('active','0')->update(['active'=> '0']);
            $social->active = '1';
            $social->save();
            return;

        }elseif($social->active == '1'){
            Social::where('id',$social->id)->update(['active'=> '0']);
            return;
        }
    }

   


    public function render()
    {
        $social = Social::orderByDesc('id')->paginate(3);

        return view('livewire.list-social',compact('social'));
    }
}
