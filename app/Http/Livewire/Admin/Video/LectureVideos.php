<?php

namespace App\Http\Livewire\Admin\Video;

use Livewire\Component;
use App\Models\Lecture;
use App\Models\Unit;
use App\Models\Video;

class LectureVideos extends Component
{
    public $lecture_id, $units, $lectures = [], $unid_id, $videos;
    public $videoToDelete;

    public function mount()
    {
        $this->units = Unit::all();
        $this->lectures = Lecture::all()->toArray();
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'unid_id' && $this->unid_id) {
            $this->lectures = Lecture::where('unit_id', $this->unid_id)->get()->toArray();
        }

        if ($propertyName == 'lecture_id' && $this->lecture_id) {
            $lecture = Lecture::find($this->lecture_id);
            $this->videos = $lecture ? $lecture->videos->map(function($video) {
                $video->embed_link = $this->convertToEmbedLink($video->link);
                return $video;
            }) : null;
        }
    }

    private function convertToEmbedLink($link)
    {
        if (strpos($link, 'youtu.be') !== false) {
            // Handle short YouTube links (e.g., https://youtu.be/xyz)
            $videoId = substr(parse_url($link, PHP_URL_PATH), 1);
        } elseif (strpos($link, 'youtube.com/watch') !== false) {
            // Handle standard YouTube links (e.g., https://www.youtube.com/watch?v=xyz)
            parse_str(parse_url($link, PHP_URL_QUERY), $query);
            $videoId = $query['v'] ?? null;
        } else {
            return null; // Invalid YouTube link
        }
        return $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
    }    

    public function confirmDelete($videoId)
    {
        $this->videoToDelete = $videoId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteVideo()
    {
        $video = Video::findOrFail($this->videoToDelete);
        $video->delete();
        session()->flash('message', 'Video deleted successfully.');
        $this->dispatchBrowserEvent('hide-delete-modal');
        $this->updated('lecture_id');
    }

    public function render()
    {
        return view('livewire.admin.video.lecture-videos')->layout('layouts.admin');
    }
}
