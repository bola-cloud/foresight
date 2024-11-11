<?php
namespace App\Http\Livewire\Admin\Video;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Video;
use App\Models\Unit;
use App\Models\Lecture;

class VideoEditController extends Component
{
    use WithFileUploads;

    public $video;
    public $video_id;
    public $unit_selected = [];
    public $title, $link;
    public $case_video = 0;
    public $year;
    public $image_video;
    public $fileId;
    public $description;
    public $selectedLecture, $selectedUnit, $selectedYear;
    public $units = [];
    public $lectures = [];

    protected $rules = [
        'title' => 'required',
        'link' => 'required|url',
        'description' => 'nullable',
        'selectedUnit' => 'required',
        'selectedLecture' => 'required',
    ];

    public function mount($id)
    {
        $this->video = Video::findOrFail($id);
        $this->video_id = $this->video->id;
        $this->title = $this->video->name_video;
        $this->link = $this->video->link;
        $this->description = $this->video->description;
        $this->selectedLecture = $this->video->lecture_id;

        $this->selectedUnit = Lecture::findOrFail($this->selectedLecture)->unit_id ?? null;

        // Load units and lectures
        $this->units = Unit::all();
        $this->lectures = $this->selectedUnit ? Lecture::where('unit_id', $this->selectedUnit)->get() : [];
    }

    public function updatedSelectedUnit()
    {
        $this->lectures = Lecture::where('unit_id', $this->selectedUnit)->get();
    }

    public function update()
    {
        $this->validate();

        $this->video->name_video = $this->title;
        $this->video->description = $this->description;
        $this->video->link = $this->link;
        $this->video->lecture_id = $this->selectedLecture;
        $this->video->save();

        session()->flash("success_message", "Video updated successfully.");
        return redirect()->route('show_lecture_videos');
    }

    public function render()
    {
        return view('livewire.admin.video.video-edit-controller', [
            'units' => $this->units,
            'lectures' => $this->lectures
        ])->layout('layouts.admin');
    }
}
