<?php

namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;
use App\Models\Block;
class EditQuestionBlock extends Component
{

    public $block;
    public $title;
    public $id_exam;
    public $question_id;
    public $id_blo;
    public function mount($question_id){
      $questionblock=Block::where("id",$question_id)->first();

      $this->title=$questionblock->title;
      $this->block=$questionblock->block;
     $this->id_exam=$questionblock->exam_id;
     $this->id_blo=$questionblock->id;

    }
    protected $rules = [
        'block' => 'required',
    ];
    public function create_question(){
        $questionblock=Block::where("id",$this->id_blo)->first();
        $questionblock->title =$this->title;
        $questionblock->block =$this->block;
        $questionblock->exam_id =$this->id_exam;
        $questionblock->save();
         return redirect()->route('show_question',['id_exam'=>$this->id_exam]);
    }
    public function render()
    {
        return view('livewire.admin.question.edit-question-block')->layout('layouts.admin');
    }
}
