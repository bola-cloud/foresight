<?php

namespace App\Http\Controllers\Api\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Unit;
use Auth;

class CategoryUnitComponent extends Controller
{
    public function getcategory(){

        if(Auth::check()){

            $units=Unit::where("year_type",Auth::user()->year_type)->get();
            $response=[
                'message'=>"units are get",
                'Result'=>$units,
            ];
            return response($response,200);
        }else{
            return response(401);
        }
      }
}
