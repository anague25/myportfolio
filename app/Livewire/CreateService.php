<?php

namespace App\Livewire;

use App\Models\Service;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CreateService extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $title;
    public $shortText;
    
    public $image;
   

    public function store(Service $service){
      

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

            if($this->image !== null && !$this->image->getError()){
               
             $image = $this->image->store('images/service','public');

            }
            // insertion
            if($this->image !== null && !$this->image->getError()){
                $service->image = $image;
            }
            $service->title = $this->title;           
            $service->shortText = $this->shortText;
            $query = $service->save();
            if($query){
                return redirect()->route('service')->with('success','the service was added successfully');
            }


        }catch(\Exception $e)
        {
           dd($e->getMessage());
        }




       
    }
    public function render()
    {
        return view('livewire.create-service');
    }
}
