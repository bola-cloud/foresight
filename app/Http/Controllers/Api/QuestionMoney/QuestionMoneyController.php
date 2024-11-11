<?php

namespace App\Http\Controllers\Api\QuestionMoney;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MoneyQuestion;
use Auth;
class QuestionMoneyController extends Controller
{
    public function moneyreturnquestions(){

        if(Auth::check()){

            if(Auth::user()->reverse_question=="0"){
                return response(
                    ['message'=>'يجب عليك الشراء اولا الباقه']
                ,400);
            }else{

                $questionschoice=MoneyQuestion::where("year_type",Auth::user()->year_type)->where("type","normal")->get();
                $QuestionsPar=MoneyQuestion::where("year_type",Auth::user()->year_type)->where("type","pargraph")->get();
                $questionschoicewithblock=MoneyQuestion::where("year_type",Auth::user()->year_type)->where("type","block")->with("block")->get();
                return response(
                  [
                   'message'=>"question are get",
                   'status'=> true,
                   'questionchoice_block'=> $questionschoicewithblock,
                   'questionchoice'=> $questionschoice,
                   'QuestionsPar'=> $QuestionsPar,
                  ]
              ,200);

            }
        }else{
            return response(401);
        }


    }
}
