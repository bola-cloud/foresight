<?php

namespace App\Http\Livewire\Admin\QuestionMOney;

use Livewire\Component;
use App\Models\MoneyQuestion;
class SelectTypeMoneyQuestion extends Component
{
    public $year_type;
    public $type;
    public function mount(){
        $this->type;
        $this->year_type;
    }
    public function delete_question($id){
        $question=MoneyQuestion::find($id);
        $question->delete();
        return redirect()->back()->with('message','َQuestion is deleted');
    }
    public function render()
    {
        $questions=MoneyQuestion::where("year_type",$this->year_type)->where("type",$this->type)->with("block")->get();

        return view('livewire.admin.question-m-oney.select-type-money-question',['questions'=>$questions])
        ->layout('layouts.admin');
    }
}
