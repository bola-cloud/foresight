<?php

namespace App\Http\Livewire\Admin\Exam;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Exam;
use App\Models\Unit;

class ShowExamComponent extends Component
{
    use WithPagination;

    public $search = ''; // For search functionality
    public $filterUnit = ''; // For filtering by unit
    public $select = []; // For status change
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        // Reset pagination when the search term changes
        $this->resetPage();
    }

    public function updatingFilterUnit()
    {
        // Reset pagination when the filter changes
        $this->resetPage();
    }

    public function delete_exam($id)
    {
        $exam = Exam::find($id);
        $exam->delete();
        session()->flash('message', 'تم مسح الامتحان');
    }

    public function options($id)
    {
        $exam = Exam::find($id);

        if (($this->select[$id] == 0) || ($this->select[$id] == 1)) {
            $exam->show_exam = $this->select[$id];
            $exam->save();
        } else if ($this->select[$id] == '3') {
            session()->flash('messagee', '');
        }

        if ($exam->show_exam == 1) {
            session()->flash('message', 'تم إظهار الامتحان');
        } else {
            session()->flash('message', 'تم إخفاء الامتحان');
        }
    }

    public function render()
    {
        // Fetch all units for filtering
        $units = Unit::all();
    
        // Fetch exams with search and filter applied
        $exams = Exam::query()
            ->when($this->search, function ($query) {
                $query->where('name_exam', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterUnit, function ($query) {
                $query->whereHas('units', function ($subQuery) {
                    $subQuery->where('units.id', $this->filterUnit); // Specify the table for 'id'
                });
            })
            ->paginate(10);
    
        return view('livewire.admin.exam.show-exam-component', [
            'exams' => $exams,
            'units' => $units,
        ])->layout('layouts.admin');
    }
    
}
