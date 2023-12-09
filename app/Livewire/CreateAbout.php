<?php

namespace App\Livewire;

use App\Models\About;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CreateAbout extends Component
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

    public function store(About $about){

        // dd($about);
      
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
            'email'=>['required','email','unique:abouts,email'],
            'freelance'=>['required','string'],
            'image'=>['required','image','mimes:jpg,png,jpeg,svg','max:2040'],
        ]);



        try{
            // picture
            $image = $this->image->store('images/about','public');

            // insertion
            $about->title = $this->title;
            $about->shortText = $this->shortText;
            $about->longText = $this->longText;
            $about->birthday = $this->birthday;
            $about->website = $this->website;
            $about->phone = $this->phone;
            $about->city = $this->city;
            $about->age = $this->age;
            $about->degree = $this->degree;
            $about->email = $this->email;
            $about->freelance = $this->freelance;
            $about->image = $image;
            $query =  $about->save();
            if($query){
                return redirect()->route('about')->with('success','the information was added successfully');
            }


        }catch(\Exception $e)
        {
           dd($e->getMessage());
        }




       
    }
    public function render()
    {
        return view('livewire.create-about');
    }
}
