<?php

namespace App\Http\Livewire\Admin\Exam;

use Livewire\Component;
use App\Models\Password_Exams;
use App\Models\Exam;

class PasswordPrintComponent extends Component
{
    public $id_exam;
    public function mount(){
        $this->id_exam;
    }
    public function render()
    {
        $passwords=Password_Exams::where("exam_id",$this->id_exam)->select("passwords")->first();
       $passwordsaccess=$passwords->passwords;
       $arraypasswod=explode(",", $passwordsaccess);
        $exam_title=Exam::where("id",$this->id_exam)->select("name_exam")->first();
        return view('livewire.admin.exam.password-print-component',['passwords'=>$arraypasswod,'exam_title'=>$exam_title]);
    }
}
