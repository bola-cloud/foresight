<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use App\Models\PargraphResult;
use App\Models\QuestionParagraph;
use App\Models\FinalResult;
use App\Models\User;

class ShowStudentExamPargraphQuestion extends Component
{
    public $student_id;
    public $exam_id;

    public function mount(){
        $this->student_id;
        $this->exam_id;
    }


    public function wrong($student_id,$exam_id,$key){

        $valueanswers=PargraphResult::where("user_id",$this->student_id)->where("exam_id",$this->exam_id)->first();
        $answers=$valueanswers->answers;
        $answers[$key]['value']="2";
        $valueanswers->answers=$answers;
        $valueanswers->save();
        $result=FinalResult::where("user_id",$student_id)->where("exam_id",$exam_id)->first();
        $degreeques=QuestionParagraph::where("id",$answers[$key]['question_id'])->first();
        $result->result=($result->result)-$degreeques->mark_question;
        $result->save();
        $this->value_result="";

    }
    public function correct($student_id,$exam_id,$key){

        $valueanswers=PargraphResult::where("user_id",$this->student_id)->where("exam_id",$this->exam_id)->first();
        $answers=$valueanswers->answers;
        $answers[$key]['value']="1";
        $valueanswers->answers=$answers;
        $valueanswers->save();
        $result=FinalResult::where("user_id",$student_id)->where("exam_id",$exam_id)->first();
        $degreeques=QuestionParagraph::where("id",$answers[$key]['question_id'])->first();
        $result->result=($result->result)+$degreeques->mark_question;
        $result->save();
        $this->value_result="";

    }
    public function render()
    {
        $user=User::where("id",$this->student_id)->first();
        $questionpargraph=PargraphResult::where("user_id",$this->student_id)->where("exam_id",$this->exam_id)->first();

        $question= QuestionParagraph::whereIn("id",collect($questionpargraph->answers)->pluck('question_id'))->get();
        $newData = [];


        foreach ($questionpargraph->answers as $key => $value) {
            $newData[$key] = $value;
            $newData[$key]['question_id'] = $question->find($value['question_id']);
        }
        $questionpargraph->answers = $newData;

        return view('livewire.admin.student.show-student-exam-pargraph-question',['questionpargraphs'=>
        $questionpargraph->answers,'user'=>$user])->layout('layouts.admin');
    }
}
