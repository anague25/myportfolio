<?php

namespace App\Livewire;

use Exception;
use App\Models\Social;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditSocial extends Component
{
    

    use WithFileUploads;
    use WithPagination;
    
    public $socials;

    public $name;

    public $links;

    public $image;
    public function mount(){
        
        $this->name = $this->socials->name;
        $this->links = $this->socials->links;
       
    }

    public function update(){
        // dd($this->heroes);
        $this->validate([
            'name'=>['required','string','min:3','max:20'],
            'links'=>['required','string','min:3','max:20'],
            'image'=>['mimes:jpg,png,jpeg','max:2000']
        ]);

        try{
            $socials = Social::findOrFail($this->socials->id);
            // picture
            if($this->image !== null && !$this->image->getError()){

                // delete the old picture
                if($socials->icon){
                    Storage::disk('public')->delete($socials->icon);
                }
               
                // add the new picture
                $image = $this->image->store('images/social','public');

            }

            // insertion
            $socials->name = $this->name;
            $socials->links = $this->links;
            $socials->icon = $image;
            $query =  $socials->save();
            if($query){
                return redirect()->route('social')->with('success','the social network was updated successfully');
            }


        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.edit-social');
    }
}
