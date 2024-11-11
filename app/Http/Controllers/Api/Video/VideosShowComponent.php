<?php

namespace App\Http\Controllers\Api\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;
use Auth;
class VideosShowComponent extends Controller
{

    public function checkvalidate($month,$year_type,$id_user){
       
        if(User::where('id',$id_user)->first()->case_reverse=="0"){
            return response(
                ['message'=>'يجب عليك الشراء اولا الباقه']
            ,400);
        }else{

            $videos=Video::where('month',$month)->where('year_type',$year_type)->get();

            return response(
                $videos
            ,200);
        }
    }

}
