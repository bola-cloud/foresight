<?php

namespace App\Http\Controllers\Api\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lecture;
use App\Models\Unit;

class BuyController extends Controller
{
    public function buy_lecture(Request $request)
    {
        $request->validate([
            'lecture_id' => 'required',
            'student_id' => 'required',
        ]);

        $student = User::find($request->student_id);
        $lecture = Lecture::find($request->lecture_id);

        if (!$student || !$lecture) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid student or lecture ID.',
            ], 400);
        }

        if ($student->lectures->contains($lecture->id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already purchased this lecture.',
            ], 400);
        }

        if ($student->wallet >= $lecture->cost) {
            // Deduct the cost from the student's wallet
            $student->wallet -= $lecture->cost;
            $student->save();

            // Attach the lecture to the student
            $student->lectures()->attach($request->lecture_id, ['created_at' => now()]);

            return response()->json([
                'status' => 'success',
                'message' => 'Lecture purchased successfully.',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Insufficient funds in wallet.',
            ], 400);
        }
    }



    public function buy_month(Request $request)
    {
        $request->validate([
            'unit_id' => 'required',
            'student_id' => 'required',
        ]);

        $student = User::find($request->student_id);
        $unit = Unit::find($request->unit_id);

        if (!$student || !$unit) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid student or unit ID.',
            ], 400);
        }

        if ($student->units->contains($unit->id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already purchased this unit.',
            ], 201);
        }

        if ($student->wallet >= $unit->cost) {
            // Deduct the cost from the student's wallet
            $student->wallet -= $unit->cost;
            $student->save();

            // Attach the unit to the student
            $student->units()->attach($request->unit_id, ['created_at' => now()]);

            return response()->json([
                'status' => 'success',
                'message' => 'Unit purchased successfully.',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Insufficient funds in wallet.',
            ], 400);
        }
    }



}
