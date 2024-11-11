<?php

namespace App\Http\Livewire\Admin\StudentQuestion;

use Livewire\Component;
use App\Models\StudentQuestion;
use App\Models\QuestionAnswer;

class AnswerQuestion extends Component
{
    public $questionId;
    public $content;

    public function mount($questionId)
    {
        $this->questionId = $questionId;

        if (auth()->user()->utype !== 'ADM') {
            abort(403, 'Unauthorized access.');
        }
    }

    public function saveAnswer()
    {
        $this->validate([
            'content' => 'required|string',
        ]);

        QuestionAnswer::create([
            'content' => $this->content,
            'student_question_id' => $this->questionId,
        ]);

        return redirect()->route('show-questions');
    }

    public function render()
    {
        $question = StudentQuestion::findOrFail($this->questionId);
        return view('livewire.admin.student-question.answer-question', ['question' => $question])->layout('layouts.admin');
    }
}
