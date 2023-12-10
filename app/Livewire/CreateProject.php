<?php

namespace App\Livewire;

use App\Models\Project;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CreateProject extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $projectName;
    public $projectDate;
    public $projectUrl;
    public $category;
    public $client;
    public $shortText;
    public $title;
    public $image;
   

    public function store(Project $project){
      
        $this->validate([
            'title'=>['required','string'],
            'projectName'=>['required','string'],
            'projectDate'=>['required','date'],
            'projectUrl'=>['required','string'],
            'category'=>['required','string'],
            'client'=>['required','string'],
            'shortText'=>['required','string'],
            'image'=>['required','image','mimes:jpg,png,jpeg','max:2000']
        ]);



        try{
            // picture
            $image = $this->image->store('images/project','public');

            // insertion
            $project->title = $this->title;
            $project->projectName = $this->projectName;
            $project->projectDate = $this->projectDate;
            $project->projectUrl = $this->projectUrl;
            $project->category = $this->category;
            $project->client = $this->client;
            $project->shortText = $this->shortText;
            $project->image = $image;
            $query =  $project->save();
            if($query){
                return redirect()->route('project')->with('success','the project was added successfully');
            }


        }catch(Exception $e)
        {
           dd($e->getMessage());
        }




       
    }
    public function render()
    {
        return view('livewire.create-project');
    }
}
