<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class CoursesComponent extends Component
{

    public $file;

    // public function store()
    // {
    //     Storage::disk('google')->put('video1', $this->file);

    // }
    public function show()
    {

    }

    public function render()
    {

        $files = Storage::disk('google')->allFiles();

        return view('livewire.courses-component',['files'=>$files])->layout('layouts.home');
    }
}
