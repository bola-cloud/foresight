<?php

namespace App\Http\Livewire\Admin\Lectures;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\Lecture;
use App\Models\Unit;

class LectureAdd extends Component
{
    use WithFileUploads;

    public $name, $unit_id, $description, $status, $image, $cost,$errorMessage;

    public function store()
    {
        // dd($this->image);
        // Validate the input data
        $validated = $this->validate([
            'name' => 'required|min:3',
            'cost' => 'required|numeric',
            'status' => 'required',
            'image' => 'nullable|max:1024', // Ensure image is an image and max size 1024KB
            'unit_id' => 'required|exists:units,id',
            'description' => 'nullable',
        ]);

        DB::beginTransaction();
        try {
            // Handle file upload if an image is provided
            $new_file = null;
            if ($this->image) {
                $filename = $this->image->getClientOriginalName();
                $this->image->storeAs('', $filename, 'public_lecture');
                $new_file = 'lecture-images/' . $filename;
            }

            // Create a new Lecture instance and fill it with validated data
            $lecture = new Lecture();
            $lecture->fill([
                'name' => $this->name,
                'cost' => $this->cost,
                'status' => $this->status, 
                'image' => $new_file,
                'unit_id' => $this->unit_id,
                'description' => $this->description,
            ]);
            $lecture->save();

            DB::commit(); // Commit the transaction if everything is successful

            session()->flash('success', 'Lecture added successfully');
            return redirect()->route('lecture_index'); // Redirect to a success route
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->errorMessage = $e->getMessage(); // Get the error message
        }
        // $this->image = null;
    }

    public function render()
    {
        $units = Unit::all();
        return view('livewire.admin.lectures.lecture-add', ['units' => $units])->layout('layouts.admin');
    }
}
