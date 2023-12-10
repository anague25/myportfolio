<?php

namespace App\Livewire;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CreateTestimonial extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $name;
    public $job;
    public $shortText;
    
    public $image;
   

    public function store(Testimonial $testimonial){
      

       
            $this->validate([
                'name'=>['required','string'],
                'job'=>['required','string'],
                'shortText'=>['required','string'],
                'image'=>['required','image','mimes:jpg,png,jpeg','max:2000']
            ]);
       
           
       



        try{

           
               
             $image = $this->image->store('images/testimonial','public');
            // insertion
           
            $testimonial->image = $image;
            $testimonial->name = $this->name;           
            $testimonial->job = $this->job;           
            $testimonial->shortText = $this->shortText;
            $query = $testimonial->save();
            if($query){
                return redirect()->route('testimonial')->with('success','the service was added successfully');
            }


        }catch(\Exception $e)
        {
           dd($e->getMessage());
        }




       
    }
    public function render()
    {
        return view('livewire.create-testimonial');
    }
}
