<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactHome extends Component
{
    public function render()
    {
        return view('livewire.contact-home')->layout('layouts.home');
    }
}
