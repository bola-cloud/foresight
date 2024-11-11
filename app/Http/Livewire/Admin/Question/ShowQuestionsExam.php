<?php

namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;
use App\Models\QuestionChoice;
use App\Models\QuestionParagraph;

use App\Models\TrueAnswer;
use App\Models\Exam;
use App\Models\Block;

class ShowQuestionsExam extends Component
{

    public $id_exam;
    public $blocks;
    public function delete_questionchoice($id){
        $question=QuestionChoice::find($id);
        $question->delete();
        return redirect()->back()->with('message','َQuestion is deleted');
    }
    #public function delete_questionpargraph($id){
        #$parg=QuestionParagraph::find($id);
       # $parg->delete();
        #return redirect()->back()->with('message','َQuestion is deleted');
 #   }
   # public function delete_questionblock($id){
       # $block=Block::find($id);
       # $questions=QuestionChoice::where("type","block")->where("block_id",$block->id)->delete();
        #$block->delete();
       # return redirect()->back()->with('message','َQuestion is deleted');
   # }
    public function mount($id_exam){
        $this->id_exam;
       }
    public function render()

    {
        $questions=QuestionChoice::where("exam_id",$this->id_exam)->with('trueanswer')->get();




        $exam=Exam::where("id",$this->id_exam)->first();
        return view('livewire.admin.question.show-questions-exam',['questions'=>$questions,
        'exam'=>$exam,])->layout('layouts.admin');
    }
}
