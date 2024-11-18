<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use Livewire\WithPagination; // Import pagination
use App\Models\User;

class StudentSearch extends Component
{
    use WithPagination;

    public $searchTerm;

    protected $paginationTheme = 'bootstrap'; // Optional: For Bootstrap pagination styles

    public function render()
    {
        // Query to fetch users based on search term with pagination
        $query = User::where('utype', 'USR');

        if ($this->searchTerm) {
            $query->where(function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->searchTerm . '%')
                         ->orWhere('student_code', 'like', '%' . $this->searchTerm . '%')
                         ->orWhere('mobile_phone', 'like', '%' . $this->searchTerm . '%');
            });
        }

        $users = $query->paginate(10); // Paginate results (10 per page)

        return view('livewire.admin.student.student-search', ['users' => $users])
            ->layout('layouts.admin');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('message', 'Student deleted successfully');
        return redirect()->route('student_search');
    }
}
