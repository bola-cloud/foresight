<?php

namespace App\Http\Livewire\Admin\StudentSubscribe;

use Livewire\Component;
use App\Models\User;
use App\Models\Lecture;
use App\Models\Unit;
use App\Models\Transaction;

class SubscribeDelete extends Component
{
    public $searchTerm, $results, $selectedStudent, $subscription_type, $month_id, $lecture_id;

    public function updated()
    {
        if ($this->searchTerm) {
            $this->results = User::where('utype', 'USR')
                                ->where('mobile_phone', 'like', '%' . $this->searchTerm . '%')
                                ->orWhere('student_code', 'like', '%' . $this->searchTerm . '%')
                                ->orWhere('name', 'like', '%' . $this->searchTerm . '%')
                                ->get();
        } else {
            $this->results = null;
        }
    }

    public function selectStudent($studentId)
    {
        $this->selectedStudent = User::find($studentId);
        $this->searchTerm = $this->selectedStudent->name;
        $this->results = null;
    }

    public function deleteLectureSub($id)
    {
        $lecture = Lecture::find($id);

        if (!$lecture) {
            session()->flash("error_message", "Lecture not found.");
            return redirect()->route('subscript_delete');
        }

        $this->selectedStudent->lectures()->detach($id);

        Transaction::create([
            'user_id' => $this->selectedStudent->id,
            'lecture_id' => $id,
            'method' => 'subscription',
            'amount' => $lecture->cost ?? 0,
            'type' => 'withdraw',
            'code' => $this->generateUniqueCode(),
        ]);

        session()->flash("success_message", "You have deleted the lecture subscription.");
        return redirect()->route('subscript_delete');
    }

    public function deleteUnitSub($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            session()->flash("error_message", "Unit not found.");
            return redirect()->route('subscript_delete');
        }

        $this->selectedStudent->units()->detach($id);

        Transaction::create([
            'user_id' => $this->selectedStudent->id,
            'unit_id' => $id,
            'method' => 'subscription',
            'amount' => $unit->cost ?? 0,
            'type' => 'withdraw',
            'code' => $this->generateUniqueCode(),
        ]);

        session()->flash("success_message", "You have deleted the unit subscription.");
        return redirect()->route('subscript_delete');
    }

    private function generateUniqueCode()
    {
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code .= rand(1, 9);
        }

        while (Transaction::where('code', $code)->exists()) {
            $code = '';
            for ($i = 0; $i < 6; $i++) {
                $code .= rand(1, 9);
            }
        }

        return $code;
    }

    public function render()
    {
        return view('livewire.admin.student-subscribe.subscribe-delete')->layout('layouts.admin');
    }
}
