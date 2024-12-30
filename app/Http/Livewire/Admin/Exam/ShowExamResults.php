<?php

namespace App\Http\Livewire\Admin\Exam;

use Livewire\Component;
use App\Models\ChoiceResult;
use App\Models\User;

class ShowExamResults extends Component
{
    public $id_exam;

    public function mount($id_exam)
    {
        $this->id_exam = $id_exam;
    }

    public function render()
    {
        // Fetch choice results for the exam
        $results = ChoiceResult::where('exam_id', $this->id_exam)
            ->with('users') // Ensure the user relationship is loaded
            ->get();

        return view('livewire.admin.exam.show-exam-results', [
            'results' => $results,
        ])->layout('layouts.admin');
    }
}
