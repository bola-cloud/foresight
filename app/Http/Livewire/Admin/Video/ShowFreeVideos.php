<?php

namespace App\Http\Livewire\Admin\Video;

use Livewire\Component;
use App\Models\Video;
use App\Models\Lecture;
use App\Models\Unit;

class ShowFreeVideos extends Component
{
    public $freeVideos;
    public $videoToDelete;
    public $search = '';
    public $selectedUnit = '';
    public $selectedLecture = '';
    public $units;
    public $lectures;

    /**
     * Initialize component data
     */
    public function mount()
    {
        $this->units = Unit::all(); // Fetch all units
        $this->lectures = collect(); // Empty collection initially
        $this->loadVideos();
    }

    /**
     * Fetch and filter free videos
     */
    public function loadVideos()
    {
        $query = Video::where('type', 'free');

        if ($this->search) {
            $query->where('name_video', 'like', '%' . $this->search . '%');
        }

        if ($this->selectedUnit) {
            $query->whereHas('lecture', function ($q) {
                $q->where('unit_id', $this->selectedUnit);
            });
        }

        if ($this->selectedLecture) {
            $query->where('lecture_id', $this->selectedLecture);
        }

        $this->freeVideos = $query->get();
    }

    /**
     * Update lectures when a unit is selected
     */
    public function updatedSelectedUnit()
    {
        $this->lectures = Lecture::where('unit_id', $this->selectedUnit)->get();
        $this->selectedLecture = ''; // Reset lecture filter when unit changes
        $this->loadVideos();
    }

    /**
     * Update the videos list when lecture filter changes
     */
    public function updatedSelectedLecture()
    {
        $this->loadVideos();
    }

    /**
     * Update the videos list when search input changes
     */
    public function updatedSearch()
    {
        $this->loadVideos();
    }

    /**
     * Show confirmation modal before deleting
     */
    public function confirmDelete($videoId)
    {
        $this->videoToDelete = $videoId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    /**
     * Delete the selected free video
     */
    public function deleteVideo()
    {
        $video = Video::findOrFail($this->videoToDelete);
        $video->delete();

        session()->flash('message', 'تم حذف الفيديو بنجاح.');
        $this->dispatchBrowserEvent('hide-delete-modal');

        // Refresh the list after deletion
        $this->loadVideos();
    }

    /**
     * Render the component view
     */
    public function render()
    {
        return view('livewire.admin.video.show-free-videos', [
            'freeVideos' => $this->freeVideos,
            'units' => $this->units,
            'lectures' => $this->lectures,
        ])->layout('layouts.admin');
    }
}
