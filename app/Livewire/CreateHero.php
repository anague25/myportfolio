<?php

namespace App\Livewire;

use App\Models\Hero;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CreateHero extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $firstName;
    public $lastName;
    public $job;
    public $image;

    public function store(Hero $heroes){
      
        $this->validate([
            'firstName'=>['required','string','min:3','max:20'],
            'lastName'=>['required','string','min:3','max:20'],
            'job'=>['required','string','min:3'],
            'image'=>['mimes:jpg,png,jpeg','max:2000']
        ]);



        try{
            // picture
            $image = $this->image->store('images/heroes','public');

            // insertion
            $heroes->firstName = $this->firstName;
            $heroes->lastName = $this->lastName;
            $heroes->job = $this->job;
            $heroes->img = $image;
            $query =  $heroes->save();
            if($query){
                return redirect()->route('portfolio')->with('success','the profile was added successfully');
            }


        }catch(\Exception $e)
        {
           dd($e->getMessage());
        }




       
    }
    public function render()
    {
        return view('livewire.create-hero');
    }
}
