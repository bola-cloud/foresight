<?php

namespace App\Http\Livewire\Admin\Question;

use Livewire\Component;
use App\Models\QuestionChoice;
use App\Models\TrueAnswer;
use App\Models\Block;
use Livewire\WithFileUploads;

class AddQuestionChoice extends Component
{
    use WithFileUploads;
    public $question;
    public $id_exam;
    public $a;
    public $b;
    public $c;
    public $d;
    public $mark_question=1;
    public $true_ans;
    public $type;
    public $image;
    public $block_id;

    public function mount($id_exam){

     $this->id_exam;
     $this->type=$this->type;

    }
    protected $rules = [
        'question' => 'required',
        'a' => 'required',
        'b' => 'required',
        'c' => 'required',
        'd' => 'required',
        'type'=>'required',
        'true_ans' => 'required',
        'image' => 'nullable|max:2048'
    ];
    public function create_question(){
        $this->validate();

        $new_file = null;
        if ($this->image) {
            $filename = $this->image->getClientOriginalName();
            $this->image->storeAs('', $filename, 'questions');
            $new_file = 'question-images/' . $filename;
        }

        $question =new QuestionChoice;
        $question->exam_id =$this->id_exam;
        $question->question=$this->question;
        $question->a=$this->a;
        $question->b=$this->b;
        $question->c=$this->c;
        $question->d=$this->d;
        $question->image=$new_file;

        $question->mark_question=1;

        $question->save();

        $question_id = QuestionChoice::latest()->first()->id;
        $trueans=new TrueAnswer;
        $trueans->question_id=$question_id;
         if($this->true_ans=='1'){
            session()->flash('message','choose correcct');
        }else{
            $trueans->ans=$this->true_ans;
            $trueans->save();
            return redirect()->route('show_question',['id_exam'=>$this->id_exam]);
        }

    }
    public function render()
    {
        $blocks=Block::where("exam_id",$this->id_exam)->get();

        return view('livewire.admin.question.add-question-choice',['blocks'=>$blocks])->layout('layouts.admin');
    }
}
