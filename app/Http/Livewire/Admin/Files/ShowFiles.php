<?php

namespace App\Http\Livewire\Admin\Files;

use Livewire\Component;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;


class ShowFiles extends Component
{

    public $year_type,$file_path,$showModal = false;

    public function showFile($id)
    {
        $fileModel = Files::findOrFail($id);
        $this->file_path = $fileModel->path;
        $this->showModal = true;
    }

    public function mount($year_type)
    {
        $this->year_type=$year_type;
    }

    public function render()
    {
        $year_type= $this->year_type;
        $files=Files::where('year_type',$this->year_type)->get();
        return view('livewire.admin.files.show-files',[
            'year_type'=>$year_type,
            'files'=>$files,
        ])->layout('layouts.admin');
    }
}
