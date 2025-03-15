<?php

namespace App\Http\Controllers\Api\Lectures;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Unit;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $target_model;

    public function __construct()
    {
        $this->target_model=new Lecture;
        $this->target_unit=new Unit;
    }


    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $target_lecture = $this->target_model->find($id);
        return $target_lecture;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function unitLecturesFree($id)
    {
        $target_unit = $this->target_unit->find($id);

        // Filter lectures that have at least one free video
        $lectures = $target_unit->lectures()->whereHas('videos', function ($query) {
            $query->where('type', 'free');
        })->get();

        return $lectures;
    }

    public function unitLecturesPaid($id)
    {
        $target_unit = $this->target_unit->find($id);

        if (!$target_unit) {
            return response()->json(['error' => 'Unit not found'], 404);
        }

        // Debugging: Check if the unit has lectures
        if ($target_unit->lectures->isEmpty()) {
            return response()->json(['error' => 'No lectures found for this unit'], 404);
        }

        // Debugging: Fetch lectures and check if they contain videos
        $lectures = $target_unit->lectures()->whereHas('videos', function ($query) {
            $query->where('type', 'paid');
        })->get();

        if ($lectures->isEmpty()) {
            return response()->json(['error' => 'No lectures with paid videos found'], 404);
        }

        return response()->json($lectures);
    }


}
