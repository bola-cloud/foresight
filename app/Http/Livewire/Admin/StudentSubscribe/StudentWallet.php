<?php

namespace App\Http\Livewire\Admin\StudentSubscribe;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Lecture;
use App\Models\Unit;
use App\Models\Transaction;

class StudentWallet extends Component
{
    public $searchTerm, $results, $selectedStudent, $table, $wallet, $old_balance;

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
        $this->selectedStudent = User::with(['lectures', 'units'])->find($studentId);
        $this->old_balance = $this->selectedStudent->wallet;
        $this->lectures = $this->selectedStudent->lectures;
        $this->units = $this->selectedStudent->units;
        // Clear search results and search term
        $this->results = null;
        $this->searchTerm = '';
    }

    public function deposit()
    {
        $this->validate([
            'wallet' => 'required|regex:/^[1-9]\d*$/',
        ]);

        $new_balance = $this->wallet + $this->old_balance;
        $this->selectedStudent->update([
            'wallet' => $new_balance
        ]);

        Transaction::create([
            'user_id' => $this->selectedStudent->id,
            'method' => 'wallet',
            'amount' => $this->wallet,
            'type' => 'deposite',
            'code' => $this->generateUniqueCode(),
        ]);

        session()->flash("success_message", "You added a new Balance to the student.");
        return redirect()->route('student_wallet');
    }

    public function withdraw()
    {
        $this->validate([
            'wallet' => 'required|regex:/^[1-9]\d*$/',
        ]);

        if ($this->wallet > $this->old_balance) {
            session()->flash("error_message", "The balance isn't enough.");
            return redirect()->route('student_wallet');
        }

        $new_balance = $this->old_balance - $this->wallet;
        $this->selectedStudent->update([
            'wallet' => $new_balance
        ]);

        Transaction::create([
            'user_id' => $this->selectedStudent->id,
            'method' => 'wallet',
            'amount' => $this->wallet,
            'type' => 'withdraw',
            'code' => $this->generateUniqueCode(),
        ]);

        session()->flash("success_message", "You have withdrawn from the student's balance.");
        return redirect()->route('student_wallet');
    }

    private function generateUniqueCode()
    {
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code .= rand(1, 9);
        }

        // Ensure the code is unique by checking against the existing transactions
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
        return view('livewire.admin.student-subscribe.student-wallet')->layout('layouts.admin');
    }
}
