<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use App\Models\User;

class ShowStudentComponent extends Component
{
    public $year_type;
    public function mount(){
        $this->year_type;
    }
    public function editreverse($student_id){
        $student=User::where("id",$student_id)->first();
        $student->case_reverse="1";
        $student->save();
    }
    public function deletereverse($student_id){
        $student=User::where("id",$student_id)->first();
        $student->case_reverse="0";
        $student->save();
    }
    public function editreverseque($student_id){
        $student=User::where("id",$student_id)->first();
        $student->reverse_question="1";
        $student->save();
    }
    public function deletereverseque($student_id){
        $student=User::where("id",$student_id)->first();
        $student->reverse_question="0";
        $student->save();
    }

    public function deletestudent($student_id){
        $student=User::where("id",$student_id)->first();
        $student->delete();
        return redirect()->back();
    }




    public function render()
    {
        $students=User::where("utype","USR")->where("year_type",$this->year_type)->get();
        return view('livewire.admin.student.show-student-component',['students'=>$students])->layout('layouts.admin');
    }
}
