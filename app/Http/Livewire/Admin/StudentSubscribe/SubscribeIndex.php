<?php

namespace App\Http\Livewire\Admin\StudentSubscribe;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Lecture;
use App\Models\Unit;

class SubscribeIndex extends Component
{
    public $searchTerm,$results,$selectedStudent,$table;

    public function updated()
    {   
        if ($this->searchTerm) {
            $this->results = User::where('utype', 'USR')
                                ->where('mobile_phone', 'like', '%' . $this->searchTerm . '%')
                                ->orWhere('student_code', 'like', '%' . $this->searchTerm . '%')
                                ->orWhere('name', 'like', '%' . $this->searchTerm . '%')->get();
           
        } else {
            $this->results = null;
        }
        $lectures=Lecture::where('status','active')->get();
        $units=Unit::all();
    }
    public function selectStudent($studentId)
    {
        $this->selectedStudent = User::with(['lectures', 'units'])->find($studentId);
        $this->lectures = $this->selectedStudent->lectures;
        $this->units = $this->selectedStudent->units;
    }
    
    public function render()
    {
        return view('livewire.admin.student-subscribe.subscribe-index')->layout('layouts.admin');
    }
}
