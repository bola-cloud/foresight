<?php

namespace App\Http\Livewire\Admin\Files;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Files;
use App\Models\Unit;

use Livewire\Component;

class AddFile extends Component
{
    // public function mount(Request $request,$year)
    // {
    //     $validated = $request->validate([
    //         'title' => 'required|unique:posts|max:255',
    //         'body' => 'required',
    //     ]);
    // }

    public function store(Request $request)
    {
        $new_file = new Files();
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();

        $new_file->title = $request->file_title;
        $new_file->description = $request->description;
        $new_file->year_type = $request->year;
        $new_file->month = $request->month;
        $new_file->name = $file_name;
        $unit_id = $request->unit;
        $path = 'files';

        // Move the uploaded file to the public/files directory
        $uploaded_file = $file->move(public_path($path), $file_name);

        // Store the relative path to the file in the database
        $new_file->path = $path . '/' . $file_name;

        $new_file->save();
        $new_file->units()->attach([
            $unit_id => [
                'created_at' => now()
            ]
        ]);

        session()->flash('success_message', 'Upload file was successful');
        return redirect()->back();
    }



    public function render()
    {
        $units=Unit::all();
        $table = 'files';
        $column = 'year_type';
        $enumValues = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '$column'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $enumValues, $matches);
        $enumOptions = [];

        if (isset($matches[1])) {
            $enumOptions = explode(',', $matches[1]);
            $enumOptions = array_map(function ($value) {
                return trim($value, "'");
            }, $enumOptions);
        }

        $table1 = 'files';
        $column1 = 'month';
        $enumValues = DB::select(DB::raw("SHOW COLUMNS FROM $table1 WHERE Field = '$column1'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $enumValues, $matches);
        $enumOptions1 = [];

        if (isset($matches[1])) {
            $enumOptions1 = explode(',', $matches[1]);
            $enumOptions1 = array_map(function ($value) {
                return trim($value, "'");
            }, $enumOptions1);
        }
        return view('livewire.admin.files.add-file',[
            'enumOptions'=>$enumOptions,
            'enumOptions1'=>$enumOptions1,
            'units'=>$units,
        ])->layout('layouts.admin');
    }
}
