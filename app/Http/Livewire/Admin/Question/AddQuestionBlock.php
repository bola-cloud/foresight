<?php

namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;
use App\Models\Block;
class AddQuestionBlock extends Component
{
    public $block;
    public $title;
    public $id_exam;
    public function mount($id_exam){
     $this->id_exam;
    }
    protected $rules = [
        'block' => 'required',
    ];
    public function create_question(){
        $this->validate();
        $block =new Block;
        $block->title =$this->title;
        $block->block =$this->block;
        $block->exam_id =$this->id_exam;
         $block->save();
         return redirect()->route('show_question',['id_exam'=>$this->id_exam]);
    }
    public function render()
    {
        return view('livewire.admin.question.add-question-block')->layout('layouts.admin');
    }
}
