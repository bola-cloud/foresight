<?php

namespace App\Http\Livewire\Admin\QuestionMOney;

use Livewire\Component;
use App\Models\MoneyBlock;
class AddMoneyBlockComponent extends Component
{
    public $block;
    public $title;
    public $year_type;
    protected $rules = [
        'block' => 'required',
        'year_type' => 'required',

    ];
    public function create_question(){
        $this->validate();
        $block =new MoneyBlock;
        $block->title =$this->title;
        $block->block =$this->block;
         $block->save();
         return redirect()->route('moneyshowquestuion',['year_type'=>$this->year_type]);
    }
    public function render()
    {
        return view('livewire.admin.question-m-oney.add-money-block-component')->layout('layouts.admin');
    }
}
