<?php

namespace App\Http\Livewire\Admin\QuestionMOney;

use Livewire\Component;
use App\Models\MoneyBlock;
use App\Models\MoneyQuestion;


class EditMoneyQuestionComponent extends Component
{
    public $type;
    public $question;
    public $id_exam;
    public $a;
    public $b;
    public $c;
    public $d;
    public $true_ans;
    public $block_id;
    public $answer;
    public $year_type;
    public $ide;

    public function mount($type,$ide){
        $question=MoneyQuestion::where("id",$ide)->first();
        $this->block_id=$question->block_id !=null ? $question->block_id :null;
        $this->question=$question->question !=null ? $question->question :null;
        $this->a =$question->a !=null ? $question->a :null;
        $this->b=$question->b !=null ? $question->b :null;
        $this->c=$question->c !=null ? $question->c :null;
        $this->d  =$question->d !=null ? $question->d :null;
        $this->answer =$question->answer !=null ? $question->answer :null;
        $this->true_ans =$question->trueanswer !=null ? $question->trueanswer :null;
        $this->type  =$question->type !=null ?$question->type :null;
        $this->year_type =$question->year_type !=null ? $question->year_type :null;
        $this->ide =$question->id;

    }
    public function edit_question(){
        $question=MoneyQuestion::where("id",$this->ide)->first();
        $question->block_id=$this->block_id !=null ? $this->block_id :null;
        $question->question=$this->question !=null ? $this->question :null;
        $question->a=$this->a!=null ? $this->a :null;
        $question->b=$this->b!=null ? $this->b :null;
        $question->c=$this->c!=null ? $this->c :null;
        $question->d=$this->d!=null ? $this->d :null;
        $question->answer=$this->answer!=null ? $this->answer :null;
        $question->trueanswer=$this->true_ans!=null ? $this->true_ans :null;
        $question->type=$this->type!=null ? $this->type :null;
        $question->year_type=$this->year_type!=null ? $this->year_type :null;
        $question->save();
      return redirect()->route('moneyshowquestuion',['year_type'=>$this->year_type]);

    }
    public function render()
    {
        $blocks=MoneyBlock::all();
        return view('livewire.admin.question-m-oney.edit-money-question-component',['blocks'=>$blocks ])->layout('layouts.admin');
    }

}
