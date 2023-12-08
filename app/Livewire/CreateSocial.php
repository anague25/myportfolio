<?php

namespace App\Livewire;

use Exception;
use App\Models\Social;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CreateSocial extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name;

    public $links;

    public $image;

    public function store(Social $social){
      
        $this->validate([
            'name'=>['required','string','max:20'],
            'links'=>['required','string','max:20'],
            'image'=>['mimes:jpg,png,jpeg','max:2040']
        ]);



        try{
            // picture
            $image = $this->image->store('images/social','public');

            // insertion
            $social->name = $this->name;
            $social->links = $this->links;
            $social->icon = $image;
            $query =  $social->save();
            if($query){
                return redirect()->route('social')->with('success','the profile was added successfully');
            }


        }catch( \Exception $e )
        {
           dd($e->getMessage());
        }

       
   
    }

    public function render()
    {
        return view('livewire.create-social');
    }



}