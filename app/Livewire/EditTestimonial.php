<?php

namespace App\Livewire;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditTestimonial extends Component
{
    
    
    use WithFileUploads;
    use WithPagination;
    public $name;
    public $job;
    public $shortText;
    
    public $image;
    public $testimonial;
   

    public function update(){
      

       
            $this->validate([
                'name'=>['required','string'],
                'job'=>['required','string'],
                'shortText'=>['required','string'],
                'image'=>['required','image','mimes:jpg,png,jpeg','max:2000']
            ]);
       
           
       



        try{
            $testimonial = Testimonial::findOrFail($this->testimonial->id);
            // picture
            if($this->image !== null && !$this->image->getError()){
                // delete the old picture
                if($testimonial->image){
                    Storage::disk('public')->delete($testimonial->image);
                }
               
                // add the new picture
               // picture
            $image = $this->image->store('images/testimonial','public');

            }

        
            // insertion
           
            $this->testimonial->image = $image;
            $this->testimonial->name = $this->name;           
            $this->testimonial->job = $this->job;           
            $this->testimonial->shortText = $this->shortText;
            $query = $this->testimonial->save();
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
        return view('livewire.edit-testimonial');
    }
}
