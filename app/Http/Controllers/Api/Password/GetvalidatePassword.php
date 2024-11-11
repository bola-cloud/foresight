<?php

namespace App\Http\Controllers\Api\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Password_Exams;
use Auth;
class GetvalidatePassword extends Controller
{
    public function validatepassword($exam_id,$password){

        $password_exam=Password_Exams::where('exam_id', $exam_id)->first();
        $arraypasswords=explode(',', $password_exam->passwords);
        $noSpaces = str_replace(' ', '',strtolower($password));
        if (in_array("$noSpaces", $arraypasswords)) {
            $password_sent=$password;
            $passwords_new = array_diff($arraypasswords, ["$noSpaces"]);
            $passwords_saves = implode(",",$passwords_new);
            $password_exam->passwords=$passwords_saves;
            $password_exam->save();
            return response(
                [ 'message'=>"exam are get",
                 'status'=> true,
                 'password_exam'=> $password_sent]
            ,200);
        } else {
            return response(
                ['message'=>"password wrong",
                 'status'=> false,
                 'data'=> null]
            ,200);
        }

    }
}
