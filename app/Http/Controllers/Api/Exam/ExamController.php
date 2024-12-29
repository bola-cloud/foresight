<?php

namespace App\Http\Controllers\API\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\ChoiceResult;
use Auth;
class ExamController extends Controller
{
    public function returnexams()
    {
        $id_student = Auth::id();
    
        // Retrieve the units the student is associated with
        $userUnits = Unit::whereHas('students', function ($query) use ($id_student) {
            $query->where('user_id', $id_student);
        })->pluck('id');
    
        // Retrieve the exams associated with those units
        $exams = Exam::where('show_exam', 1)
                     ->whereHas('units', function ($query) use ($userUnits) {
                         $query->whereIn('units.id', $userUnits);
                     })
                     ->get();
    
        // Retrieve the exams the student has already completed
        $exams_done = ChoiceResult::where('user_id', $id_student)->pluck('exam_id')->toArray();
    
        // Filter exams that are not in the exams_done list
        $available_exams = $exams->filter(function ($exam) use ($exams_done) {
            return !in_array($exam->id, $exams_done);
        });
    
        return response($available_exams->values(), 200);
    }    

}
