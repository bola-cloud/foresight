<?php

namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;
use App\Models\QuestionChoice;
use App\Models\TrueAnswer;
use Livewire\WithFileUploads;

class EditQuestionsExam extends Component
{
    use WithFileUploads;

    public $question_id;
    public $exam_id;
    public $teacher_id;
    public $question;
    public $a;
    public $b;
    public $c;
    public $image; // For new image upload
    public $newimage; // For displaying the uploaded image
    public $d;
    public $true_ans;
    protected $listeners = ['updateanswer'=>'updateanswer'];

    public function updateanswer()
    {
        $question=QuestionChoice::where('id',$this->question_id)->first();
        $true_ans=TrueAnswer::where('question_id',$this->question_id)->first();
        $true_ans->ans=$this->true_ans;
        $true_ans->save();
    }
    public function mount($question_id)
    {
        $question_id=$this->question_id;
        $exam_id=$this->exam_id;
        $teacher_id=$this->teacher_id;
        $question=QuestionChoice::where('id',$question_id)->first();
        $this->question=$question->question;
        $this->a=$question->a;
        $this->b=$question->b;
        $this->c=$question->c;
        $this->d=$question->d;
        $this->image = $question->image; // Set the old image
        $true_ans=TrueAnswer::where('question_id',$question_id)->first();
        $this->true_ans=$true_ans->ans;
    }


    public function updateQuestion()
    {
        $question = QuestionChoice::where('id', $this->question_id)->first();
    
        // Handle the new image
        if ($this->newimage) {
            // Get the old image path relative to the `public` directory
            $oldImagePath = public_path($question->image); // Full path to the old image
    
            // Delete the old image if it exists
            if ($question->image && file_exists($oldImagePath)) {
                unlink($oldImagePath); // Use unlink() to delete the file
            }
    
            // Save the new image to the `public/question-images` directory
            $filename = $this->newimage->getClientOriginalName();
            $this->newimage->storeAs('', $filename, 'questions');
            $question->image = 'question-images/' . $filename; // Update the image path in the database
        }
    
        // Update other question fields
        $question->question = $this->question;
        $question->a = $this->a;
        $question->b = $this->b;
        $question->c = $this->c;
        $question->d = $this->d;
        $question->save();
    
        $true_ans = TrueAnswer::where('question_id', $this->question_id)->first();
        $true_ans->ans = $this->true_ans;
        $true_ans->save();
    
        session()->flash('success', 'تم تعديل السوال');
        return redirect()->route('show_question', ['id_exam' => $question->exam->id]);
    }
    
    public function render()
    {
        return view('livewire.admin.question.edit-questions-exam')->layout('layouts.admin');
    }
}
