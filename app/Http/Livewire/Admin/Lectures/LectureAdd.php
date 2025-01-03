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
        $validated = $this->validate([
            'name' => 'required|min:3',
            'status' => 'required',
            'image' => 'nullable|max:1024',
            'unit_id' => 'required|exists:units,id',
            'description' => 'nullable',
        ]);
    
        DB::beginTransaction();
        try {
            $new_file = null;
            if ($this->image) {
                $filename = $this->image->getClientOriginalName();
                $this->image->storeAs('', $filename, 'public_lecture');
                $new_file = 'lecture-images/' . $filename;
            }
    
            $lecture = new Lecture();
            $lecture->fill([
                'name' => $this->name,
                'cost' => 0,
                'status' => $this->status,
                'image' => $new_file,
                'unit_id' => $this->unit_id,
                'description' => $this->description,
            ]);
            $lecture->save();
    
            DB::commit();
            session()->flash('success', 'تم اضافة القسم بنجاح');
            return redirect()->route('lecture_index');
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->errorMessage = $e->getMessage();
            Log::error('Error in LectureAdd@store: ' . $e->getMessage());
        }
    }
    

    public function render()
    {
        $units = Unit::all();
        return view('livewire.admin.lectures.lecture-add', ['units' => $units])->layout('layouts.admin');
    }
}
