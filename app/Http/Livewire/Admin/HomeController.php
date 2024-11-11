<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;

class HomeController extends Component
{
    public $search;
    public $case=0;
    public $student;

    public function editreverse($student_id){
        $student=User::where("id",$student_id)->first();
        $student->case_reverse="1";
        $student->save();
    }
    public function deletereverse($student_id){
        $student=User::where("id",$student_id)->first();
        $student->case_reverse="0";
        $student->save();
    }
    public function editreverseque($student_id){
        $student=User::where("id",$student_id)->first();
        $student->reverse_question="1";
        $student->save();
    }
    public function deletereverseque($student_id){
        $student=User::where("id",$student_id)->first();
        $student->reverse_question="0";
        $student->save();
    }

    public function deletestudent($student_id){
        $student=User::where("id",$student_id)->first();
        $student->delete();
    }
    public function getstudent(){
     $this->student=User::where("mobile_phone",$this->search)->first();
     $this->case=1;
    }

    public function render()
    {
        // $unit=Unit::find(1);
        // $unit_files=$unit->files;
        // $filePath = storage_path('app/livewire-tmp/yasmeen.pdf');
        // $file = Storage::get($filePath);
        // dd($file);
        // $unit = Unit::find(2);
        // $files = $unit->files;
        // $filePath = $files[0]->path; // Assuming this is the correct path in your database
        // $url = Storage::url($filePath);
        // $url = Storage::disk('public')->url($filePath);
        return view('livewire.admin.home-controller')->layout('layouts.admin');
    }
}
