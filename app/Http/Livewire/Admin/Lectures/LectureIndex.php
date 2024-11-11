<?php

namespace App\Http\Livewire\Admin\Lectures;

use Livewire\Component;
use App\Models\Lecture;
use App\Models\Unit;

class LectureIndex extends Component
{
    public $year_type,$unit_id;

    public function render()
    {
        $lectures = Lecture::query()
            ->when($this->year_type, function($query) {
                $query->whereHas('unit', function($q) {
                    $q->where('year_type', $this->year_type);
                });
            })
            ->when($this->unit_id, function($query) {
                $query->where('unit_id', $this->unit_id);
            })
            ->get();
        
        $units = Unit::all();
        return view('livewire.admin.lectures.lecture-index',['lectures'=>$lectures,'units'=>$units])->layout('layouts.admin');
    }

    public function delete($id)
    {
        $lectures = Lecture::find($id);
        $lectures->delete();
        session()->flash('success', 'Lecture deleted successfully');
        return redirect()->route('lecture_index');
    }

}
