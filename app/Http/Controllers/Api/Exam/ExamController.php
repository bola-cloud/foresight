<?php

namespace App\Http\Controllers\API\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Unit;
use App\Models\User;
use App\Models\ChoiceResult;
use Auth;

class ExamController extends Controller
{
    public function returnexams($id_student)
    {
        // Fetch the user with related units
        $user = User::with('units')->find($id_student);
    
        if (!$user) {
            return response(['message' => 'User not found'], 404);
        }
    
        // Debug the user's related units
        $user_units = $user->units->pluck('id');
        if ($user_units->isEmpty()) {
            return response(['message' => 'The user is not related to any units'], 404);
        }
    
        // Debug the exams related to these units
        $exams = Exam::where('show_exam', 1)
            ->whereHas('units', function ($query) use ($user) {
                $query->whereIn('units.id', $user->units->pluck('id'));
            })
            ->get();
    
        if ($exams->isEmpty()) {
            return response(['message' => 'No exams are associated with the user\'s units'], 404);
        }
    
        // Fetch exams the user has already completed
        $exams_done = ChoiceResult::where("user_id", $id_student)->pluck('exam_id')->toArray();
    
        // Filter exams that the user has not completed
        $available_exams = $exams->filter(function ($exam) use ($exams_done) {
            return !in_array($exam->id, $exams_done);
        });
    
        if ($available_exams->isEmpty()) {
            return response(['message' => 'No available exams for the user'], 404);
        }
    
        return response($available_exams->values(), 200);
    }    
    
     
    // public function returnexams($id_student)
    // {

    //     $exams = Exam::where('show_exam', 1)->get();

    //     $exams_done = ChoiceResult::where("user_id", $id_student)->pluck('exam_id')->toArray();

    //     // Filter exams that are not in the exams_done list
    //     $available_exams = $exams->filter(function ($exam) use ($exams_done) {
    //         return !in_array($exam->id, $exams_done);
    //     });

    //     return response($available_exams->values(), 200);
    // }
}
