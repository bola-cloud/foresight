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

    public function mount($id_exam)
    {
        $exam = Exam::with('units')->where('id', $id_exam)->first();
    
        if ($exam) {
            $this->name_exam = $exam->name_exam;
            $this->time = $exam->time;
            $this->id_exam = $exam->id;
            $this->unit_selected = $exam->units->pluck('id')->toArray(); // Pre-fill selected units
        } else {
            session()->flash('message', 'Exam not found');
            return redirect()->route('show_exam');
        }
    }
    

    protected $rules = [
        'name_exam' => 'required',
        'time' => 'required|integer',
        'unit_selected' => 'required|array|min:1', // Ensure at least one unit is selected
    ];    

    public function edit_exam()
    {
        $this->validate();
    
        // Fetch the exam
        $exam = Exam::find($this->id_exam);

        if (!$exam) {
            session()->flash("message", "Exam not found");
            return redirect()->route("show_exam");
        }

        // Update exam details
        $exam->name_exam = $this->name_exam;
        $exam->time = $this->time;
        $exam->save();

        // Detach old relationships
        $exam->units()->detach();

        // Attach new relationships
        $exam->units()->attach($this->unit_selected);

        session()->flash("message", "Exam updated successfully");
        return redirect()->route("show_exam");
    }    
    
    public function render()
    {
        $this->units=Unit::all();
        return view('livewire.admin.exam.exam-edit-controller')->layout('layouts.admin');
    }
}
