<?php

namespace App\Livewire;

use App\Models\About;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditAbout extends Component
{ 
    use WithFileUploads;
    use WithPagination;
    public $title;
    public $shortText;
    public $longText;
    public $birthday;
    public $website;
    public $phone;
    public $city;
    public $age;
    public $degree;
    public $email;
    public $freelance;
    public $image;
    public $about;


    public function mount(){
        
        $this->title = $this->about->title;
        $this->shortText = $this->about->shortText;
        $this->longText = $this->about->longText;
        $this->birthday = $this->about->birthday;
        $this->website = $this->about->website;
        $this->phone = $this->about->phone;
        $this->city = $this->about->city;
        $this->age = $this->about->age;
        $this->degree = $this->about->degree;
        $this->email = $this->about->email;
        $this->freelance = $this->about->freelance;
    
    }

    public function update(){

        // dd($about);
        if($this->image !== null && !$this->image->getError()){
        $this->validate([
            'title'=>['required','string'],
            'shortText'=>['required','string'],
            'longText'=>['required','string'],
            'birthday'=>['required','date'],
            'website'=>['required','string','min:3'],
            'phone'=>['required','string'],
            'city'=>['required','string'],
            'age'=>['required','integer',],
            'degree'=>['required','string'],
            'email'=>['required','email'],
            'freelance'=>['required','string'],
            'image'=>['required','image','mimes:jpg,png,jpeg,svg','max:2040'],
        ]);
    }else{

        $this->validate([
            'title'=>['required','string'],
            'shortText'=>['required','string'],
            'longText'=>['required','string'],
            'birthday'=>['required','date'],
            'website'=>['required','string','min:3'],
            'phone'=>['required','string'],
            'city'=>['required','string'],
            'age'=>['required','integer',],
            'degree'=>['required','string'],
            'email'=>['required','email'],
            'freelance'=>['required','string'],
            // 'image'=>['required','image','mimes:jpg,png,jpeg,svg','max:2040'],
        ]);

    }



        try{

            $about = About::findOrFail($this->about->id);
            // picture
            if($this->image !== null && !$this->image->getError()){
                // delete the old picture
                if($about->image){
                    Storage::disk('public')->delete($about->image);
                }
               
                // add the new picture
               // picture
            $image = $this->image->store('images/about','public');

            }
           

            // insertion
            if($this->image !== null && !$this->image->getError()){
               
                $this->about->image = $image;
            }
            $this->about->title = $this->title;
            $this->about->shortText = $this->shortText;
            $this->about->longText = $this->longText;
            $this->about->birthday = $this->birthday;
            $this->about->website = $this->website;
            $this->about->phone = $this->phone;
            $this->about->city = $this->city;
            $this->about->age = $this->age;
            $this->about->degree = $this->degree;
            $this->about->email = $this->email;
            $this->about->freelance = $this->freelance;

           
            $query =  $this->about->save();
            if($query){
                return redirect()->route('about')->with('success','the information was updated successfully');
            }


        }catch(\Exception $e)
        {
           dd($e->getMessage());
        }




       
    }
    public function render()
    {
        return view('livewire.edit-about');
    }
}
