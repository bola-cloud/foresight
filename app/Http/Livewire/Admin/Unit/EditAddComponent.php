<?php

namespace App\Http\Livewire\Admin\Unit;

use Livewire\Component;
use App\Models\Unit;
use Livewire\WithFileUploads;
use Storage;

class EditAddComponent extends Component
{
    use WithFileUploads;

    public $name_unit;
    public $year_unit;
    public $ide;
    public $cost;
    public $image_unit;
    public $image_unit_new;

    public function mount($ide)
    {
        $unit = Unit::findOrFail($ide);
        $this->name_unit = $unit->name;
        $this->year_unit = $unit->year_type;
        $this->cost = $unit->cost;
        $this->image_unit = $unit->image_unit;
        $this->ide = $ide;
    }

    protected $rules = [
        'name_unit' => 'required',
        'year_unit' => 'required',
        'cost' => 'required|numeric',
        'image_unit_new' => 'nullable|image|max:1024' // Ensuring the new image is valid
    ];

    public function edit_unit()
    {
        $this->validate();

        $unit = Unit::findOrFail($this->ide);
        $unit->name = $this->name_unit;
        $unit->cost = $this->cost;
        $unit->year_type = $this->year_unit;

        if ($this->image_unit_new) {
            // Delete the old image if it exists
            if ($this->image_unit) {
                Storage::disk('public_folder')->delete($this->image_unit);
            }

            // Store the new image
            $filename = $this->image_unit_new->getClientOriginalName();
            $this->image_unit_new->storeAs('', $filename, 'public_folder');
            $unit->image_unit = 'units-images/' . $filename;
        }

        $unit->save();
        return redirect()->route("show_unit");
    }

    public function render()
    {
        return view('livewire.admin.unit.edit-add-component')->layout('layouts.admin');
    }
}
