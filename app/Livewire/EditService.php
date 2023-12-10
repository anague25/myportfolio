<?php

namespace App\Livewire;

use Exception;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditService extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $title;
    public $shortText;
    
    public $image;
    public $service;
   

    public function mount(){
        
        $this->title = $this->service->title;
        $this->shortText = $this->service->shortText;
       
    
    }
    public function update(){
      

        if($this->image !== null && !$this->image->getError()){
            $this->validate([
                'title'=>['required','string'],
                'shortText'=>['required','string'],
                'image'=>['required','image','mimes:jpg,png,jpeg','max:2000']
            ]);
        }else{
            $this->validate([
                'title'=>['required','string'],
                'shortText'=>['required','string']
            ]);
        }
       



        try{

            $service = Service::findOrFail($this->service->id);
            // picture
            if($this->image !== null && !$this->image->getError()){
                // delete the old picture
                if($service->image){
                    Storage::disk('public')->delete($service->image);
                }
               
                // add the new picture
               // picture
            $image = $this->image->store('images/service','public');

            }
            // insertion
            if($this->image !== null && !$this->image->getError()){
                $this->service->image = $image;
            }
            $this->service->title = $this->title;           
            $this->service->shortText = $this->shortText;
            $query = $this->service->save();
            if($query){
                return redirect()->route('service')->with('success','the service was added successfully');
            }


        }catch(Exception $e)
        {
           dd($e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.edit-service');
    }
}
