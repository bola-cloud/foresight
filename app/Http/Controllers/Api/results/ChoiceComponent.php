<?php

namespace App\Http\Controllers\Api\results;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChoiceResult;

class ChoiceComponent extends Controller
{
    public function getchoice_user($id_user,$id_exam){
        $choices=ChoiceResult::where("user_id",$id_user)->where('exam_id',$id_exam)->first();
        return response(
            [ 'message'=>"exams with result are get",
             'status'=> true,
             'data'=> $choices]
        ,200);
    }
}
