<?php

namespace App\Http\Controllers\API\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\ChoiceResult;
use Auth;
class ExamController extends Controller
{
 public function returnexams($year_type, $id_student)
    {

        $exams = Exam::where("year_type", $year_type)->where('show_exam', 1)->get();

        $exams_done = ChoiceResult::where("user_id", $id_student)->pluck('exam_id')->toArray();

        // Filter exams that are not in the exams_done list
        $available_exams = $exams->filter(function ($exam) use ($exams_done) {
            return !in_array($exam->id, $exams_done);
        });

        return response($available_exams->values(), 200);
    }

}
