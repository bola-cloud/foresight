<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeLanding extends Component
{
    
 
    public function render()
    {
      
        return view('livewire.home-landing',)->layout('layouts.home');
    }
}
