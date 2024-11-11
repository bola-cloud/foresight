<?php

namespace App\Http\Livewire\Admin\Exam;

use Livewire\Component;
use App\Models\Exam;

class ShowExamComponent extends Component
{
    public $year_type;
    public $select=[];


    public function mount($year_type){
        $this->year_type;
        }

        public function delete_exam($id){
            $exam=Exam::find($id);
            $exam->delete();
            return redirect()->back()->with('message','تم مسح الامتحان');

        }
        public function options($id){
            $exam=Exam::find($id);

            if(($this->select[$id]==0) ||($this->select[$id]==1)){
             $exam->show_exam=$this->select[$id];
             $exam->save();
            }else if($this->select[$id]=='3'){
                session()->flash('messagee','');
            }
            if($exam->show_exam==1){
                return redirect()->back()->with('message','تم اظهار الامتحان');
            }else{
                return redirect()->back()->with('message','تم اخفاء  الامتحان');

            }

        }
    public function render()
    {
        $exams=Exam::where("year_type",$this->year_type)->get();
        return view('livewire.admin.exam.show-exam-component',['exams'=>$exams])->layout('layouts.admin');
    }
}
