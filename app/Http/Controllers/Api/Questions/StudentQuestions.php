<?php

namespace App\Http\Controllers\Api\Questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentQuestion;

class StudentQuestions extends Controller
{

    public $target_model;

    public function __construct()
    {
        $this->target_model=new StudentQuestion;
    }
    public function index($unit_id)
    {
        $studentQuestion=$this->target_model->where('unit_id',$unit_id)->get();
        return $studentQuestion;
    }


    public function store(Request $request)
    {
    // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'content' => 'required',
            'year_type' => 'required',
            'answer' => 'required',
        ]);

        try {
            // Create a new StudentQuestion instance and assign values from the request
            $studentQuestion = new StudentQuestion();
        
            $studentQuestion->user_id = $validatedData['user_id'];
            $studentQuestion->content = $validatedData['content'];
            $studentQuestion->year_type = $validatedData['year_type'];
            $studentQuestion->answer = $validatedData['answer'];

            // Save the question to the database
            $studentQuestion->save();

            // Return a response with success message and data
            return response()->json([
                'message' => 'Student question posted successfully',
                'data' => $studentQuestion
            ], 201);

        } catch (\Exception $e) {
            // Handle any errors that may occur during the save process
            return response()->json([
                'message' => 'Failed to post student question',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function show($year_type)
    {
        $questions=StudentQuestion::where('year_type',$year_type)->get();

           return response()->json($questions, 200);
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
