<?php
namespace App\Http\Livewire\Admin\Video;

use Livewire\Component;
use App\Models\FreeVideo;

class EditFreeVideo extends Component
{
    public $videoId;
    public $name, $status, $description, $link, $year_type;
    
    protected $rules = [
        'link' => 'required',
        'name' => 'required',
        'description' => 'required',
        'status' => 'boolean',
    ];

    public function mount(FreeVideo $video)
    {
        $this->videoId = $video->id;
        $this->name = $video->name;
        $this->description = $video->description;
        $this->link = $video->link;
        $this->status = $video->status;
        $this->year_type = $video->year_type;
    }

    public function update()
    {
        $this->validate();

        $video = FreeVideo::find($this->videoId);
        $video->name = $this->name;
        $video->description = $this->description;
        $video->link = $this->link;
        $video->status = (int) $this->status;
        $video->year_type = $this->year_type;
        $video->save();

        return redirect()->route('show_free_video');
    }

    public function delete()
    {
        $video = FreeVideo::find($this->videoId);
        $video->delete();

        return redirect()->route('free_videos_show');
    }

    public function render()
    {
        return view('livewire.admin.video.edit-free-video')->layout('layouts.admin');
    }
}
