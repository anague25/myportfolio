<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ListService extends Component
{

    use WithFileUploads;
    

    public function delete(Service $service){
        if($service->image){
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return redirect()->route("service")->with("success","service was deleted succesfully");

    }

   
    public function render()
    {
        $service = Service::orderByDesc('id')->paginate(3);
        return view('livewire.list-service',compact('service'));
    }
}
