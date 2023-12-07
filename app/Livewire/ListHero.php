<?php

namespace App\Livewire;

use App\Models\Hero;
use Livewire\Component;

class ListHero extends Component
{
    public function render()
    {
        $heroes = Hero::orderByDesc('id')->paginate(5);

        return view('livewire.list-hero', compact('heroes'));
    }
}
