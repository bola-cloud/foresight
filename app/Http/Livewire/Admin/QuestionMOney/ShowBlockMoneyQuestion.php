<?php

namespace App\Http\Livewire\Admin\QuestionMOney;

use Livewire\Component;
use App\Models\MoneyBlock;
class ShowBlockMoneyQuestion extends Component
{
    public $ide;

    public function mount($ide){
        $moneyblock=MoneyBlock::where("id",$ide)->first();

        $this->ide=$moneyblock->id;
    }
    public function render()
    {
        $moneyblock=MoneyBlock::where("id",$this->ide)->first();

        return view('livewire.admin.question-m-oney.show-block-money-question',['moneyblock'=>$moneyblock])->layout('layouts.admin');
    }
}
