<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Unit;
use Auth;

class GetUnitComponent extends Controller
{
      public function getcategory()
      {
            $units = Unit::with('exams')->get();

            return response()->json($units, 200);

      }
}

