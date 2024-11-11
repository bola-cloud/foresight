<?php

namespace App\Http\Livewire\Admin\QuestionMOney;

use Livewire\Component;
use App\Models\MoneyQuestion;

use App\Models\MoneyBlock;


class AddMoneyQuestionComponent extends Component
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
    public function mount(){
        $this->type;
    }
    public function create_question(){
        $question =new MoneyQuestion;
        $question->block_id=$this->block_id!=null ? $this->block_id :null;
        $question->question=$this->question!=null ? $this->question :null;
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

        return view('livewire.admin.question-m-oney.add-money-question-component',['blocks'=>$blocks])->layout('layouts.admin');
    }
}
