<?php

namespace App\Http\Livewire\Admin\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Slider;

class SlideAddComponent extends Component
{

    use WithFileUploads;

    public $title, $image, $sliderId, $isOpen = false;
    public $sliders;

    protected $listeners = ['deleteSlider' => 'delete'];

    public function render()
    {
        $this->sliders = Slider::all();
        return view('livewire.admin.slider.slide-add-component')->layout('layouts.admin');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->image = null;
        $this->sliderId = null;
    }

    public function store()
    {
        $rules = [
            'title' => 'required|string|max:255',
        ];

        // Validate image only for new sliders or if a new image is uploaded
        if (!$this->sliderId || ($this->image instanceof \Livewire\TemporaryUploadedFile)) {
            $rules['image'] = 'required|image|max:1024';
        }

        $this->validate($rules);

        $new_file = null;

        if ($this->image instanceof \Livewire\TemporaryUploadedFile) {
            // Handle image upload only if a new image is provided
            $filename = $this->image->getClientOriginalName();
            $this->image->storeAs('', $filename, 'public_slider');
            $new_file = 'slider-images/' . $filename;
        }

        // Prepare data for updating/creating
        $data = [
            'title' => $this->title,
        ];

        if ($new_file) {
            $data['image'] = $new_file;
        }

        Slider::updateOrCreate(['id' => $this->sliderId], $data);

        session()->flash('message', $this->sliderId ? 'Slider updated successfully.' : 'Slider created successfully.');
        $this->closeModal();
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        $this->sliderId = $id;
        $this->title = $slider->title;
        $this->image = $slider->image;
        $this->openModal();
    }

    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider->image) {
            \Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();

        session()->flash('message', 'Slider deleted successfully.');
    }
}
