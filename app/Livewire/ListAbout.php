<?php

namespace App\Livewire;

use App\Models\About;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ListAbout extends Component
{


    use WithFileUploads;
    

    public function delete(About $about){
        if($about->image){
            Storage::disk('public')->delete($about->image);
        }
        $about->delete();
        return redirect()->route("about")->with("success","information was deleted succesfully");

    }


  


    // public function toggleStatus(About $about){
    //     if($about->active == '0'){
    //         About::where('active','0')->update(['active'=> '0']);
    //         $about->active = '1';
    //         $about->save();
    //         return;

    //     }elseif($about->active == '1'){
    //         About::where('id',$about->id)->update(['active'=> '0']);
    //         return;
    //     }
    // }

    public function render()
    {
        $about = About::orderByDesc('id')->paginate(3);
        return view('livewire.list-about',compact('about'));
    }
}
