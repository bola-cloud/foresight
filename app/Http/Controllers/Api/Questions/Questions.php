<?php

namespace App\Http\Controllers\Api\Questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionChoice;
use App\Models\QuestionParagraph;
use Illuminate\Support\Facades\DB;

class Questions extends Controller
{
    public function returnquestions($id_exam){

        $questionschoice=QuestionChoice::where("exam_id",$id_exam)->with("trueanswer")->with("block")->get();
        $QuestionsPar=QuestionParagraph::where("exam_id",$id_exam)->get();
        $array =$questionschoice->merge($QuestionsPar);

        return response($array,200);
    }
      
    // return all questions of a unit
    // public function studentQuestion($unit_id)
    // {
    //     $studentQuestion=StudentQuestion::where('unit_id',$unit_id);
    //     return $studentQuestion;
    // }
    // post a question of a unit
    // public function postStudentQuestion(Request $request)
    // {
    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         'content' => 'required|string|max:255',
    //         'unit_id'=>'required|numeric',
            
    //         // Add other fields as necessary
    //     ]);

    //     // Create a new StudentQuestion instance
    //     $studentQuestion = new StudentQuestion();
    //     $studentQuestion->unit_id = $validatedData['unit_id'];
    //     $studentQuestion->user_id = 1; // Assuming the user is authenticated
    //     $studentQuestion->question = $validatedData['content'];
        
    //     // Save the question to the database
    //     $studentQuestion->save();

    //     // Return a response
    //     return response()->json([
    //         'message' => 'Student question posted successfully',
    //         'data' => $studentQuestion
    //     ], 201);
    // }

      
}
