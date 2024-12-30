<?php

namespace App\Http\Livewire\Admin\Exam;

use Livewire\Component;
use App\Models\Exam;
use App\Models\Unit;

class ExamEditController extends Component
{
    public $name_exam;
    public $unit_selected = [];
    public $units;
    public $year;
    public $time;
    public function mount($id_exam){
        $exam=Exam::where("id",$id_exam)->first();
        $this->name_exam=$exam->name_exam;
        $this->time=$exam->time;
        foreach($exam->units as $uni){
         $this->units=$uni->name;
        }
        $this->id_exam=$exam->id;
        dd($this->units);
    }


    protected $rules = [
        'name_exam' => 'required',
        'time'=>'required|integer'
    ];

    public function edit_exam(){
        $this->validate();
        $exam=Exam::where("id",$this->id_exam)->first();
        $exam->name_exam=$this->name_exam;
        $exam->time=$this->time;
        $exam->save();
        $unitIds=$this->unit_selected;
        $exam->units()->attach($unitIds);
        session()->flash("message","you add exam");
        return redirect()->route("show_exam");
    }
    public function render()
    {
        $this->units=Unit::all();
        return view('livewire.admin.exam.exam-edit-controller')->layout('layouts.admin');
    }
}
