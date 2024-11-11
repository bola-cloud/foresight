<?php

namespace App\Http\Livewire\Admin\QuestionMOney;

use Livewire\Component;
use App\Models\QuestionChoice;
use App\Models\QuestionParagraph;


class ShowMoneyQuestionComponent extends Component
{
    public $year_type;
    public function mount (){
        $this->year_type;
    }
    public function render()
    {
        return view('livewire.admin.question-m-oney.show-money-question-component')->layout('layouts.admin');
    }
}
