<?php

namespace App\Http\Livewire\Admin\StudentQuestion;

use Livewire\Component;
use App\Models\StudentQuestion;

class ShowQuestions extends Component
{
    public $expandedQuestionId = null;

    public function toggleAnswers($questionId)
    {
        if ($this->expandedQuestionId === $questionId) {
            $this->expandedQuestionId = null;
        } else {
            $this->expandedQuestionId = $questionId;
        }
    }
    public function render()
    {
        $questions = StudentQuestion::with('user')->get();
        return view('livewire.admin.student-question.show-questions', [
            'questions' => $questions,
            'expandedQuestionId' => $this->expandedQuestionId
        ])->layout('layouts.admin');
    }
}
