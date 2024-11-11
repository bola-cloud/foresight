<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use App\Models\User;

class StudentSearch extends Component
{
    public $searchTerm;
    public $year;

    public function render()
    {
        // Query to fetch users based on search term and year
        $query = User::where('utype', 'USR');

        if ($this->searchTerm) {
            $query->where(function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->searchTerm . '%')
                         ->orWhere('student_code', 'like', '%' . $this->searchTerm . '%')
                         ->orWhere('mobile_phone', 'like', '%' . $this->searchTerm . '%');

            });
        }

        if ($this->year && $this->year !== '0') {
            $query->where('year_type', $this->year);
        }

        $users = $query->get();

        return view('livewire.admin.student.student-search', ['users' => $users])
            ->layout('layouts.admin');
    }
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        session()->flash('message', 'Student deleted successfully');
        return redirect()->route('student_search');
    }
}
