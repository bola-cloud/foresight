<?php

namespace App\Http\Controllers\Api\QuestionAnswers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use App\Models\StudentQuestion;

class QuestionAnswers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $target_model;
    
    public function __construct()
    {
        $this->target_model=new QuestionAnswer;
    }

    public function index()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
            'student_question_id' => 'required|numeric',
        ]);
        $question= StudentQuestion::find($request->student_question_id);
        if($question){
            $questionAnswer = $this->target_model->create($validatedData);
            return response()->json(['message'=>'تم اضافة الاجابة'],202);
        }else{
            return response()->json(['message'=>'Question not found'],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($question_id)
    {
        $questionAnswers = $this->target_model->where('student_question_id',$question_id)->get();
        return $questionAnswers;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
