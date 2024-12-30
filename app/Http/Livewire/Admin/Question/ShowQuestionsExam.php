<?php
namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\QuestionChoice;
use App\Models\TrueAnswer;
use App\Models\Exam;

class ShowQuestionsExam extends Component
{
    use WithPagination;

    public $id_exam;
    public $search = ''; // For search functionality
    protected $paginationTheme = 'bootstrap'; // Optional: for Bootstrap-compatible pagination styles

    public function updatingSearch()
    {
        // Reset pagination when the search term changes
        $this->resetPage();
    }

    public function delete_questionchoice($id)
    {
        $question = QuestionChoice::find($id);
        $question->delete();
        session()->flash('message', 'تم حذف السؤال');
    }

    public function mount($id_exam)
    {
        $this->id_exam = $id_exam;
    }

    public function render()
    {
        // Fetch questions with search filter
        $questions = QuestionChoice::where("exam_id", $this->id_exam)
            ->where(function ($query) {
                $query->where('question', 'like', '%' . $this->search . '%')
                    ->orWhere('a', 'like', '%' . $this->search . '%')
                    ->orWhere('b', 'like', '%' . $this->search . '%')
                    ->orWhere('c', 'like', '%' . $this->search . '%')
                    ->orWhere('d', 'like', '%' . $this->search . '%');
            })
            ->with('trueanswer')
            ->paginate(10); // 10 items per page

        $exam = Exam::where("id", $this->id_exam)->first();

        return view('livewire.admin.question.show-questions-exam', [
            'questions' => $questions,
            'exam' => $exam,
        ])->layout('layouts.admin');
    }
}
