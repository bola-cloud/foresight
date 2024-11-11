<?php

namespace App\Http\Controllers\Api\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;

class HandleFiles extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /** *** apis **** */
public function show($unit_id)
{
    $unit = Unit::find($unit_id);
    $fileDetails = []; // Initialize the array

    if ($unit && $unit->files) { // Check if the unit exists and has files
        $files = $unit->files;
        foreach ($files as $file) {
            if ($file && $file->units && isset($file->units[0])) { // Ensure $file and $file->units[0] are not null
                $baseUrl = 'https://menamaherbigben.com';
                $path = $baseUrl . '/public/' . $file->path;
                $fileDetails[] = [
                    'name' => $file->name,
                    'title' => $file->title,
                    'unit_name' => $file->units[0]->name, // Ensure $file->units[0] is not null
                    'path' => $path,
                ];
            }
        }

        if (empty($fileDetails)) {
            return response()->json(['message' => 'No files found for this unit'], 404);
        }

        return response()->json($fileDetails);
    } else {
        return response()->json(['message' => 'Unit not found or no files for this unit'], 404);
    }
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
}
