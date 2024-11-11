<?php

namespace App\Http\Livewire\Admin\Video;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Livewire\Component;
use App\Models\Video;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Unit;
use App\Models\Lecture;
use App\Models\VideoUnit;
use Google_Client;
use Google_Service_Drive;

class VideoAddController extends Component
{
    use WithFileUploads;


    public $video;
    public $video_id;
    public $unit_selected = [];
    public $title,$link;
    public $case_video=0;
    public $year;
    public $image_video;
    public $fileId;
    public $description;
    public $selectedLecture ,$selectedUnit,$selectedYear ;
   
    protected $rules = [
        'title' => 'required',
        'image_video' => 'required'
    ];

    public function mount($year)
    {
        $this->year = $year;
        $this->units = Unit::where('year_type', $this->year)->get();
        // dd($this->units);
        $this->lectures = collect(); // Initialize as empty collection
    }

    public function store()
    {
        $this->validate([
            'link' => 'required|url',
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $new_video = new Video;
        $new_video->name_video = $this->title;
        $new_video->description = $this->description;
        $new_video->link = $this->link;
        $new_video->lecture_id = $this->selectedLecture;
        $new_video->save();

        return redirect()->route('show_lecture_videos');
    }

    public function updated()
    {
        if ($this->selectedUnit) {
            $this->lectures = Lecture::where('unit_id', $this->selectedUnit)->get();
        } else {
            $this->lectures = collect();
        }
    }

    public function render()
    {
        $this->case_video;
        if ($this->video_id != null) {
            $this->video = Video::findOrFail($this->video_id);
        } else {
            $this->video = Video::latest()->first();
        }

        $video_last_name = $this->video ? $this->video->name_video : 'no exist';
        $fileId = $this->fileId;

        return view('livewire.admin.video.video-add-controller', [
            'units' => $this->units,
            'video_last_name' => $video_last_name,
            'fileId' => $fileId,
            'lectures' => $this->lectures
        ])->layout('layouts.admin');
    }

    public function unit_relate_video()
    {
        $this->validate();

        if ($this->video) {
            $video_last = $this->video;
            $video_last->name_video = $this->title;

            if ($this->image_video) {
                $imagename = time() . '.' . $this->image_video->extension();
                $disk = Storage::disk('photos');
                $path = $disk->putFileAs('videos', $this->image_video, $imagename);
                $video_last->image_video = $path;
            }

            $video_last->save();
        } else {
            $video_last = Video::latest()->first();
        }

        if ($video_last->units->contains($this->unit_selected)) {
            session()->flash("message", "You have already related this unit to the video.");
        } else {
            $video_last->units()->attach($this->unit_selected); // Many-to-many relationship
            session()->flash("message", "Unit successfully related to video.");
            return redirect()->route("show_video", ['year_type' => $this->year]);
        }
    }
}