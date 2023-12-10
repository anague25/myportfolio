<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ListContact extends Component
{ 
    use WithPagination;

    public function delete(Contact $contact){
        $contact->delete();
        return redirect()->route("contact")->with("success","contact was deleted succesfully");

    }

    public function toggleStatus(Contact $contact){
        // dd($contact);
        $query = Contact::where('action','1')->get();
        if($query->isEmpty()){
            $contact->update(['action'=> '1']); 
        }else{
            Contact::where('action','1')->update(['action'=> '0']);
            $contact->update(['action'=> '1']);
        }
      
    }

   
    public function render()
    {
        $contact = Contact::orderByDesc('id')->paginate(3);
        return view('livewire.list-contact',compact('contact'));
    }
}
