<?php

namespace App\Http\Livewire\Admin\StudentSubscribe;

use Livewire\Component;
use App\Models\User;
use App\Models\Unit;
use App\Models\Transaction;

class SubscribeAdd extends Component
{
    public $searchTerm, $results, $selectedStudent, $month_id;

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
    }

    public function subscript()
    {
        $this->validate([
            'selectedStudent' => 'required',
            'month_id' => 'required',
        ]);

        if ($this->selectedStudent->units()->wherePivot('unit_id', $this->month_id)->exists()) {
            session()->flash("warning_message", "The student already has this month.");
            return redirect()->route('subscript_add');
        } else {
            $this->selectedStudent->units()->attach($this->month_id, ['created_at' => now()]);

            $unit = Unit::find($this->month_id);
            $amount = $unit->cost ?? 0;

            Transaction::create([
                'user_id' => $this->selectedStudent->id,
                'unit_id' => $this->month_id,
                'method' => 'subscription',
                'amount' => $amount,
                'type' => 'deposite',
                'code' => $this->generateUniqueCode(),
            ]);

            session()->flash("success_message", "You added a new month to the student.");
        }

        return redirect()->route('subscript_index');
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
        $units = Unit::all();
        return view('livewire.admin.student-subscribe.subscribe-add', [
            'units' => $units,
        ])->layout('layouts.admin');
    }
}
