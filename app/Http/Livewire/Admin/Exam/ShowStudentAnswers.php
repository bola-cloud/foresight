<?php

namespace App\Http\Livewire\Admin\Exam;

use Livewire\Component;
use App\Models\ChoiceResult;

class ShowStudentAnswers extends Component
{
    public $id_exam;
    public $user_id;

    public function mount($id_exam, $user_id)
    {
        $this->id_exam = $id_exam;
        $this->user_id = $user_id;
    }

    public function render()
    {
        // Fetch choice results for the specific user and exam
        $result = ChoiceResult::where('exam_id', $this->id_exam)
            ->where('user_id', $this->user_id)
            ->first();

        // Decode the choices JSON
        $answers = $result ? json_decode($result->choices, true) : [];

        return view('livewire.admin.exam.show-student-answers', [
            'answers' => $answers,
            'result' => $result,
        ])->layout('layouts.admin');
    }
}
