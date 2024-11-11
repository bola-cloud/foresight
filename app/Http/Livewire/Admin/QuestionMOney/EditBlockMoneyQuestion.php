<?php

namespace App\Http\Livewire\Admin\QuestionMOney;

use Livewire\Component;
use App\Models\MoneyBlock;

class EditBlockMoneyQuestion extends Component
{
    public $block;
    public $title;

    public $ide;
    public $year;

    public function mount($ide,$year_type){

        $this->year=$year_type;
        $block=MoneyBlock::where('id',$ide)->first();
        $this->title=$block->title;
        $this->block=$block->block;
        $this->ide=$block->id;
    }
    protected $rules = [
        'block' => 'required',
        'title' => 'required',
    ];
    public function create_question(){
        $this->validate();
        $block=MoneyBlock::where('id',$this->ide)->first();
        $block->title =$this->title;
        $block->block =$this->block;
         $block->save();
         return redirect()->route('selectshowquestuion',['year_type'=>$this->year,'type'=>"block"]);

}
    public function render()
    {
        return view('livewire.admin.question-m-oney.edit-block-money-question')->layout('layouts.admin');
    }
}
