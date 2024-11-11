<?php

namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;

class SelectTypeChoiceComponent extends Component
{
    public $type;
    public $id_exam;
    public function mount(){
        $this->type;
        $this->id_exam;
    }
    public function render()
    {
        return view('livewire.admin.question.select-type-choice-component')->layout('layouts.admin');
    }
}
