<?php

namespace App\Http\Controllers\Api\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrueAnswer;
use App\Models\ChoiceResult;
use App\Models\PargraphResult;
use App\Models\FinalResult;
use App\Models\QuestionChoice;

class ResultComponent extends Controller
{

    public function checkanswerchoice(Request $request){

        $count = QuestionChoice::where('exam_id', $request->get('exam_id'))->count();

            if($request->get('choices')==null){

                $data=ChoiceResult::create(
                    [
                       'choices' => $request->get('choices'),
                       'exam_id' =>$request->get('exam_id'),
                       'user_id' => $request->get('user_id'),
                       'result' => 0,
                   ]
                   );
                return response(
                    ['result'=>$data->result]
                ,200);


            }else{
            if(ChoiceResult::where("exam_id", $request->get('exam_id'))->where("user_id", $request->get('user_id'))->exists()) {
                $re=ChoiceResult::where("exam_id", $request->get('exam_id'))->where("user_id", $request->get('user_id'))->first();
                return response(
                ['result'=>$re->result]
            ,200);
            }else{
                $choicestudent=[];

                $choices = $request->get('choices');
                $result=0;

         foreach ($choices as $key => $choice) {

    $choicestudent[] = ["question_id" => $key, "choice" => $choice];

    // Get the true answer
    $choice_true = TrueAnswer::where('question_id', $key)->first();

    if ($choice_true != null) {
        $true_choice = $choice_true->ans;

        if ($true_choice == $choice) {



            // Update the result
            $result += $choice_true->question->mark_question;
        }
    }
}


             $data=ChoiceResult::create(
             [
                'choices' => $choicestudent,
                'exam_id' =>$request->get('exam_id'),
                'user_id' => $request->get('user_id'),
                'result' => "$result/$count",
            ]
            );
            return response(
                ['result'=>$data->result]
            ,200);

            }

    }
}


}




