<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use App\Models\ChoiceResult;
use App\Models\QuestionChoice;
use App\Models\Block;

class ShowStudentBlock extends Component
{

    public $student_id;
    public $exam_id;

    public function mount(){
        $this->student_id;
        $this->exam_id;
    }
    public function render()
    {
        $blocks=Block::where("exam_id",$this->exam_id)->get();


        $questionchoices=ChoiceResult::where("user_id",$this->student_id)
        ->where("exam_id",$this->exam_id)->first();

        
            $question= QuestionChoice::where("type","block")->
            whereIn("id",collect($questionchoices->choices)->pluck('question_id'))->
            with('trueanswer')->with("block")->get();

            $newData = [];
            foreach ($questionchoices->choices as $key => $value) {
                $newData[$key] = $value;
                $newData[$key]['question_id'] = $question->find($value['question_id']);
            }
            $questionchoices->choices = $newData;




        return view('livewire.admin.student.show-student-block',['questionchoices'=>$questionchoices->choices])->layout('layouts.admin');
    }
}
