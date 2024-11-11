<?php

namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;

use App\Models\QuestionParagraph;


class AddQuestionPargraph extends Component
{
    public $question;
    public $id_exam;
    public $answer;
    public $mark_question=1;


    public function mount($id_exam){
     $this->id_exam;
    }
    protected $rules = [
        'question' => 'required',
        'answer' => 'required',
        'mark_question' => 'required',

    ];

    public function create_question(){
        $this->validate();
        $question =new QuestionParagraph;
        $question->exam_id =$this->id_exam;
        $question->question=$this->question;
        $question->answer=$this->answer;
        $question->mark_question=$this->mark_question;
        $question->save();

         return redirect()->route('show_question',['id_exam'=>$this->id_exam]);


    }
    public function render()
    {
        return view('livewire.admin.question.add-question-pargraph')->layout('layouts.admin');
    }
}
