<?php

namespace App\Http\Livewire\Admin\Video;

use Livewire\Component;
use App\Models\Video;
class ShowVideoDataComponent extends Component
{
    public $ide;
    public function mount(){
        $this->ide;
    }
    public function render()
    {
        $video=Video::where("id",$this->ide)->first();
        return view('livewire.admin.video.show-video-data-component',['video'=>$video])->layout('layouts.admin');
    }
}
