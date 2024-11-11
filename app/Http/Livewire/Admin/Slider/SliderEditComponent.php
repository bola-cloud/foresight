<?php

namespace App\Http\Livewire\Admin\Slider;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;
use Storage;
class SliderEditComponent extends Component
{

    use WithFileUploads;
    public $image;
    public $new_image;
    public $title;
    public $id_slider;
    protected $rules = [

        'title' => 'required',
    ];

        public function mount($id_slider){

            $slider=Slider::where("id",$id_slider)->first();
            $this->title=$slider->title;
            $this->image=$slider->image;
            $this->id_slider=$slider->id;
        }
    public function edit_slider(){
        $this->validate();
        $slider=Slider::where("id",$this->id_slider)->first();
        $slider->title=$this->title;
        if($this->new_image!=null){
            $imagename=time().'.'.$this->new_image->extension();
                $disk = Storage::disk('photos');
                $path = $disk->putFileAs('sliders', $this->new_image, $imagename);
            $slider->image=$path;
         }
     $slider->save();
     return redirect()->route("show_slider");

    }
    public function render()
    {
        return view('livewire.admin.slider.slider-edit-component')->layout('layouts.admin');
    }
}
