<?php

namespace App\Http\Livewire\Admin\Unit;

use Livewire\Component;
use App\Models\Unit;

class UnitShowComonent extends Component
{

    public $year_type;
    public $unitToDelete;

    protected $listeners = ['deleteConfirmed' => 'deleteUnit'];

    public function confirmDelete($id)
    {
        $this->unitToDelete = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUnit()
    {
        if ($this->unitToDelete) {
            $unit = Unit::findOrFail($this->unitToDelete);
            $unit->delete();
            $this->unitToDelete = null;
            session()->flash('message', 'Unit deleted successfully.');
            return redirect()->route('show_unit');
        }
    }

    public function render()
    {
        $units = Unit::where("year_type", $this->year_type)->get();
        return view('livewire.admin.unit.unit-show-comonent', ['units' => $units])->layout('layouts.admin');
    }
}
