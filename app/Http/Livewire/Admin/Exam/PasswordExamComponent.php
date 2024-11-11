<?php

namespace App\Http\Livewire\Admin\Exam;

use Livewire\Component;
use App\Models\Password_Exams;
class PasswordExamComponent extends Component
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

        return view('livewire.admin.exam.password-exam-component',['passwords'=>$arraypasswod])->layout('layouts.admin');
    }
}
