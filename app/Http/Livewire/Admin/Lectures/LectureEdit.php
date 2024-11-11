<?php

namespace App\Http\Livewire\Admin\Lectures;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\Lecture;
use App\Models\Unit;

class LectureEdit extends Component
{
    public $name, $unit_id, $description, $status, $image, $cost, $errorMessage, $lecture;

    use WithFileUploads;

    public function mount($id)
    {
        $lecture=Lecture::find($id);
        $this->lecture=$lecture;
        $this->name=$lecture->name;
        $this->unit_id=$lecture->unit_id;
        $this->description=$lecture->description;
        $this->status=$lecture->status;
        $this->cost=$lecture->cost;
    }
    protected $rules = [
        'name' => 'required|min:3',
        'cost' => 'required|numeric',
        'status' => 'required',
        'unit_id' => 'required|exists:units,id',
        'description' => 'nullable',
    ];
    public function edit($id)
    {
        $this->validate();

        $lecture=Lecture::findOrFail($id);
        if($this->image)
        {
            $filename = $this->image->getClientOriginalName();
            $this->image->storeAs('', $filename, 'public_lecture');
            $new_file = 'lecture-images/' . $filename;
            $lecture->update([
                'image'=>$new_file
            ]);
        }
        $lecture->update([
            'name'=>$this->name,
            'cost' => $this->cost,
            'status'=>$this->status,
            'unit_id'=>$this->unit_id,
            'description'=>$this->description,
        ]);
        session()->flash('warning', 'Lecture updated successfully');
        return redirect()->route('lecture_index'); // Redirect to a success route
    }
    public function render()
    {
        $units = Unit::all();
        return view('livewire.admin.lectures.lecture-edit', ['units' => $units])->layout('layouts.admin');
    }
}
