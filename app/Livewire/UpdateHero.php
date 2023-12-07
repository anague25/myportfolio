<?php

namespace App\Livewire;

use Exception;
use App\Models\Hero;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UpdateHero extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $firstName;
    public $lastName;
    public $job;
    public $image;
    public $heroes;
    public function mount(){
        
        $this->firstName = $this->heroes->firstName;
        $this->lastName = $this->heroes->lastName;
        $this->job = $this->heroes->job;
    }

    public function update(){
        // dd($this->heroes);
        $this->validate([
            'firstName'=>['required','string','min:3','max:20'],
            'lastName'=>['required','string','min:3','max:20'],
            'job'=>['required','string','min:3'],
            'image'=>['mimes:jpg,png,jpeg','max:2000']
        ]);

        try{
            $heroes = Hero::findOrFail($this->heroes->id);
            // picture
            if($this->image !== null && !$this->image->getError()){

                // delete the old picture
                if($heroes->img){
                    Storage::disk('public')->delete($heroes->img);
                }
               
                // add the new picture
                $image = $this->image->store('images/heroes','public');

            }

            // insertion
            $heroes->firstName = $this->firstName;
            $heroes->lastName = $this->lastName;
            $heroes->job = $this->job;
            $heroes->img = $image;
            $query =  $heroes->save();
            if($query){
                return redirect()->route('portfolio')->with('success','the profile was updated successfully');
            }


        }catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.update-hero');
    }
}
