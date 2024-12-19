<?php

namespace App\Http\Livewire\Admin\Slider;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;
use Storage;
class SlideAddComponent extends Component
{

    use WithFileUploads;
    public $image;
    public $title;


    public function addslider()
    {
        $slider = new Slider;
        $slider->title = $this->title;
    
        if ($this->image) {
            $imagename = time() . '.' . $this->image->extension();
            $path = $this->image->storeAs('photos', $imagename, 'public'); // 'public' disk will use the defined 'photos' directory
            $slider->image = $path;
        }
    
        $slider->save();
        return redirect()->route("show_slider");
    }    



    public function render()
    {
        return view('livewire.admin.slider.slide-add-component')->layout('layouts.admin');
    }
}
