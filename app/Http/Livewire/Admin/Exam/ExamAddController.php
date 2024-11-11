<?php

namespace App\Http\Livewire\Admin\Exam;

use Livewire\Component;
use App\Models\Exam;
use App\Models\Unit;
use App\Models\Password_Exams;

class ExamAddController extends Component
{
    public $name_exam;
    public $unit_selected = [];
    public $units;
    public $year;
    public $time;

    public function mount(){
        $this->year;
    }
    protected $rules = [
        'name_exam' => 'required',
        'year'=>'required',
        'time'=>'required|integer'
    ];




    public function creatExam(){


        $this->validate();
        $exam=new Exam;
        $exam->name_exam=$this->name_exam;
        $exam->year_type=$this->year;
        $exam->time=$this->time;
        $exam->save();
        $unitIds=$this->unit_selected;
        $exam->units()->attach($unitIds);

        $exam_id=$exam->id;
        $password=new Password_Exams;
        $password->exam_id= $exam_id;
        foreach (range(0,270) as $i) {
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 4);
            $range[] = $pass;
            $passwords = array_unique($range);
        }
            $passwords_saves = implode(",",$passwords);
            $password->passwords=$passwords_saves;
            $password->save();


        session()->flash("message","you add exam");
        return redirect()->route("show_exam",['year_type'=>$this->year]);

    }
    public function render()
    {
        $this->units=Unit::where("year_type",$this->year)->get();

        return view('livewire.admin.exam.exam-add-controller')->layout('layouts.admin');
    }
}
