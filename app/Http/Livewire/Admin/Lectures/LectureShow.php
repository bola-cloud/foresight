<?php

namespace App\Http\Livewire\Admin\Lectures;

use Livewire\Component;

class LectureShow extends Component
{
    public function render()
    {
        return view('livewire.admin.lectures.lecture-show')->layout('layouts.admin');
    }
}
