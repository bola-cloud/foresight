<?php
namespace App\Http\Livewire\Admin\Exam;

use Livewire\Component;
use App\Models\ChoiceResult;
use App\Models\TrueAnswer;

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
        // Fetch choice result for the specific user and exam
        $result = ChoiceResult::where('exam_id', $this->id_exam)
            ->where('user_id', $this->user_id)
            ->first();

        // Ensure $result->choices is a valid array
        $answers = [];
        if ($result && $result->choices) {
            $answers = is_string($result->choices) ? json_decode($result->choices, true) : $result->choices;
        }

        // Fetch correct answers for the questions
        $correctAnswers = TrueAnswer::whereIn('question_id', array_column($answers, 'question_id'))
            ->get()
            ->keyBy('question_id');

        // Add comparison to each student answer
        $answers = array_map(function ($answer) use ($correctAnswers) {
            $questionId = $answer['question_id'];
            $correctAnswer = $correctAnswers[$questionId] ?? null;

            return [
                'question_id' => $questionId,
                'student_choice' => $answer['choice'],
                'correct_choice' => $correctAnswer ? $correctAnswer->ans : 'غير متوفر',
                'is_correct' => $correctAnswer && $answer['choice'] === $correctAnswer->ans,
            ];
        }, $answers);

        return view('livewire.admin.exam.show-student-answers', [
            'answers' => $answers,
            'result' => $result,
        ])->layout('layouts.admin');
    }
}
