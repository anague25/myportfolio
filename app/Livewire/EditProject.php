<?php

namespace App\Livewire;

use Exception;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditProject extends Component
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
    public $project;
   


    public function mount(){
        
        $this->projectName = $this->project->projectName;
        $this->projectDate = $this->project->projectDate;
        $this->projectUrl = $this->project->projectUrl;
        $this->category = $this->project->category;
        $this->client = $this->project->client;
        $this->shortText = $this->project->shortText;
        $this->title = $this->project->title;
    }
    public function update(){

        if($this->image !== null && !$this->image->getError()){
      
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
    }else{
        $this->validate([
            'title'=>['required','string'],
            'projectName'=>['required','string'],
            'projectDate'=>['required','date'],
            'projectUrl'=>['required','string'],
            'category'=>['required','string'],
            'client'=>['required','string'],
            'shortText'=>['required','string']
        ]);
    }



        try{

            $project = Project::findOrFail($this->project->id);
            // picture
            // dd($this->project);            
            if($this->image !== null && !$this->image->getError()){
                // delete the old picture
                if($project->image){
                    Storage::disk('public')->delete($project->image);
                }
               
                // add the new picture
                 // picture
             $image = $this->image->store('images/project','public');

            }
          

            // insertion
            if($this->image !== null && !$this->image->getError()){
                $this->project->image = $image;
            }
            $this->project->title = $this->title;
            $this->project->projectName = $this->projectName;
            $this->project->projectDate = $this->projectDate;
            $this->project->projectUrl = $this->projectUrl;
            $this->project->category = $this->category;
            $this->project->client = $this->client;
            $this->project->shortText = $this->shortText;

           
            $query =  $this->project->save();
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
        return view('livewire.edit-project');
    }
}
