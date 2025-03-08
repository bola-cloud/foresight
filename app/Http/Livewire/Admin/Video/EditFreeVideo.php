<?php

namespace App\Http\Livewire\Admin\Video;

use Livewire\Component;
use App\Models\Video;
use App\Models\Lecture;
use App\Models\Unit;

class EditFreeVideo extends Component
{
    public $videoId;
    public $title, $description, $link;
    public $selectedUnit, $selectedLecture;
    public $units, $lectures;

    protected $rules = [
        'title' => 'required',
        'description' => 'nullable',
        'link' => 'required|url',
        'selectedLecture' => 'required',
    ];

    public function mount(Video $video)
    {
        if ($video->type !== 'free') {
            abort(403, 'Unauthorized');
        }

        $this->videoId = $video->id;
        $this->title = $video->name_video;
        $this->description = $video->description;
        $this->link = $video->link;
        $this->selectedLecture = $video->lecture_id;
        $this->selectedUnit = optional($video->lecture)->unit_id;

        $this->units = Unit::all();
        $this->lectures = collect();

        if ($this->selectedUnit) {
            $this->loadLectures();
        }
    }

    public function updatedSelectedUnit()
    {
        $this->selectedLecture = null;
        $this->loadLectures();
    }

    public function loadLectures()
    {
        $this->lectures = $this->selectedUnit ? Lecture::where('unit_id', $this->selectedUnit)->get() : collect();
    }

    public function update()
    {
        $this->validate();

        $video = Video::findOrFail($this->videoId);
        $video->name_video = $this->title;
        $video->description = $this->description;
        $video->link = $this->link;
        $video->lecture_id = $this->selectedLecture;
        $video->save();

        return redirect()->route('show_free_video')->with('success', 'تم تحديث الفيديو المجاني بنجاح.');
    }

    public function render()
    {
        return view('livewire.admin.video.edit-free-video', [
            'units' => $this->units,
            'lectures' => $this->lectures,
        ])->layout('layouts.admin');
    }
}
