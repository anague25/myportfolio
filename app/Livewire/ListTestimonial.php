<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class ListTestimonial extends Component
{
    public function delete(Testimonial $testimonial){
        if($testimonial->image){
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();
        return redirect()->route("testimonial")->with("success","testimonial was deleted succesfully");

    }
    public function render()
    {
        $testimonial = Testimonial::orderByDesc('id')->paginate(3);

        return view('livewire.list-testimonial',compact('testimonial'));
    }
}
