<?php

namespace App\Http\Livewire\Admin\Slider;

use Livewire\Component;
use App\Models\Slider;
class SlidershowComponent extends Component
{
    public function delete_slider($id){
        $question=Slider::find($id);
        $question->delete();
        return redirect()->back()->with('message','slider is deleted');
    }
    public function render()
    {
        $sliders=Slider::all();
        return view('livewire.admin.slider.slidershow-component',['sliders'=>$sliders])->layout('layouts.admin');
    }
}
