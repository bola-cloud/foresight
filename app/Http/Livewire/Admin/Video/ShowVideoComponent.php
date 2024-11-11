<?php

namespace App\Http\Livewire\Admin\Video;

use Livewire\Component;
use App\Models\Video;
use Storage;
class ShowVideoComponent extends Component
{
    public $year_type;

    public function mount($year_type)
    {
        $this->year_type;
    }

    public function delete_video($ide)
    {
        $video=Video::where("id",$ide)->first();
        if(Storage::exists('public/videos/' . $video->video)){
            Storage::delete('public/videos/' . $video->video);
            $video->units()->detach();
            $video->delete();
            session()->flash("message","The video is deleted");
        }else{
            session()->flash("message","the video not exist");
        }
    }
    public function render()
    {
        $year_type =$this->year_type;
        // $videos=Video::whereHas("units",function ($q) use($year_type)
        // {
        //     $q->where('year_type' , $year_type);

        // })->get();
        $videos=Video::where('year_type',$year_type)->get();
        return view('livewire.admin.video.show-video-component',['videos'=>$videos])->layout('layouts.admin');
    }
}
