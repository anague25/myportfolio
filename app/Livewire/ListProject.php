<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ListProject extends Component
{
    
    use WithFileUploads;
    

    public function delete(Project $project){
        if($project->image){
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return redirect()->route("project")->with("success","project was deleted succesfully");

    }

    public function render()
    {
        $project = Project::orderByDesc('id')->paginate(3);
        return view('livewire.list-project',compact('project'));
    }
}
