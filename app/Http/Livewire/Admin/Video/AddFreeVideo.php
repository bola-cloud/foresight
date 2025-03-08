<?php

namespace App\Http\Livewire\Admin\Video;

use Livewire\Component;
use App\Models\Video;
use App\Models\Unit;
use App\Models\Lecture;

class AddFreeVideo extends Component
{
    public $name, $description, $link;
    public $units, $lectures;
    public $selectedUnit, $selectedLecture;

    /**
     * Initialize component data
     */
    public function mount()
    {
        $this->units = Unit::all(); // Fetch all available units (courses)
        $this->lectures = collect(); // Initialize as empty collection
    }

    /**
     * Store the video as a free video
     */
    public function store()
    {
        $this->validate([
            'link' => 'required|url',
            'name' => 'required',
            'description' => 'nullable',
            'selectedLecture' => 'required', // Ensure a lecture is selected
        ]);

        $new_video = new Video;
        $new_video->name_video = $this->name;
        $new_video->description = $this->description;
        $new_video->link = $this->link;
        $new_video->lecture_id = $this->selectedLecture;
        $new_video->type = 'free'; // Always setting as free
        $new_video->save();

        return redirect()->route('show_free_video')->with('success', 'تم إضافة الفيديو المجاني بنجاح');
    }

    /**
     * Update lectures when a unit is selected
     */
    public function updatedSelectedUnit()
    {
        $this->lectures = $this->selectedUnit
            ? Lecture::where('unit_id', $this->selectedUnit)->get()
            : collect();
    }

    /**
     * Render the component view
     */
    public function render()
    {
        return view('livewire.admin.video.add-free-video', [
            'units' => $this->units,
            'lectures' => $this->lectures,
        ])->layout('layouts.admin');
    }
}
