<?php
namespace App\Http\Livewire\Admin\Video;

use Livewire\Component;
use App\Models\FreeVideo;

class ShowFreeVideos extends Component
{
    public $freeVideos;
    public $videoToDelete;

    public function mount()
    {
        $this->freeVideos = FreeVideo::get();
    }

    public function confirmDelete($videoId)
    {
        $this->videoToDelete = $videoId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteVideo()
    {
        $video = FreeVideo::findOrFail($this->videoToDelete);
        $video->delete();
        session()->flash('message', 'Video deleted successfully.');
        $this->dispatchBrowserEvent('hide-delete-modal');
        $this->freeVideos = FreeVideo::where('status', 1)->get(); // Refresh the list
    }

    public function render()
    {
        return view('livewire.admin.video.show-free-videos', ['freeVideos' => $this->freeVideos])->layout('layouts.admin');
    }
}

