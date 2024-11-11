<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AboutHome extends Component
{
    public function render()
    {
        return view('livewire.about-home')->layout('layouts.home');
    }
}
