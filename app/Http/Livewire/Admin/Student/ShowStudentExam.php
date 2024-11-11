<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use App\Models\FinalResult;
class ShowStudentExam extends Component
{
    public $student_id;
    public function mount(){
        $this->student_id;
    }

    public function showresult($result_id){
        $student=FinalResult::where("id",$result_id)->first();
        $student->show_Result="1";
        $student->save();
    }
    public function hiddenresult($result_id){
        $student=FinalResult::where("id",$result_id)->first();
        $student->show_Result="0";
        $student->save();
    }

    public function deletestudent($student_id){
        $student=User::where("id",$student_id)->first();
        $student->delete();
    }

    public function render()
    {
        $exams=FinalResult::where("user_id",$this->student_id)->get();

      
        return view('livewire.admin.student.show-student-exam',['exams'=>$exams])->layout('layouts.admin');
    }
}
