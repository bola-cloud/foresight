<?php

namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;
use App\Models\QuestionParagraph;

class EditQuestionPargraph extends Component
{
    public $question;
    public $answer;
    public $mark_question;
    public $question_id;
    public $id_par;
    public $id_exam;
    public function mount($question_id){
        $questionpargraph=QuestionParagraph::where("id",$question_id)->first();
        $this->question=$questionpargraph->question;
        $this->id_exam=$questionpargraph->exam_id;

        $this->answer=$questionpargraph->answer;
        $this->mark_question=$questionpargraph->mark_question;
        $this->id_par=$questionpargraph->id;

    }
      protected $rules = [
        'question' => 'required',
        'answer' => 'required',
        'mark_question' => 'required',
    ];

    public function edit_question(){

        $this->validate();
        $questionpargraph=QuestionParagraph::where("id",$this->id_par)->first();
        $questionpargraph->question=$this->question;
        $questionpargraph->answer=$this->answer;
        $questionpargraph->exam_id =$this->id_exam;
        $questionpargraph->mark_question=$this->mark_question;
        $questionpargraph->save();

         return redirect()->route('show_question',['id_exam'=>$this->id_exam]);


    }
    public function render()
    {
        return view('livewire.admin.question.edit-question-pargraph')->layout('layouts.admin');
    }
}
