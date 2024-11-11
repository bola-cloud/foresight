<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class StudentEdit extends Component
{

    public $studentId, $errorMessage, $code, $name, $year, $mobile_father, $case = null, $mobile_phone;

    public function mount($id)
    {
        $student = User::findOrFail($id);
        $this->studentId = $student->id;
        $this->name = $student->name;
        $this->year = $student->year_type;
        $this->mobile_father = $student->mobile_father;
        $this->code = $student->student_code;
        $this->mobile_phone = $student->mobile_phone;
        $this->case = $student->case_reverse;
    }

    public function generateUniqueCode()
    {
        $characters = '0123456789';
        $charactersNumber = strlen($characters);
        $codeLength = 6;

        do {
            $code = '';
            for ($i = 0; $i < $codeLength; $i++) {
                $code .= $characters[rand(0, $charactersNumber - 1)];
            }
        } while (User::where('student_code', $code)->exists());

        $this->code = $code;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|string|in:ONE,TWO,THREE',
            'mobile_father' => 'required|string|max:15',
            'code' => 'required|string|max:50',
            'mobile_phone' => 'required|string|size:11|unique:users,mobile_phone,' . $this->studentId,
        ]);

        try {
            DB::beginTransaction();

            $student = User::findOrFail($this->studentId);
            $student->name = $this->name;
            $student->year_type = $this->year;
            $student->mobile_father = $this->mobile_father;
            $student->student_code = $this->code;
            $student->mobile_phone = $this->mobile_phone;
            $student->case_reverse = $this->case;
            $student->save();

            DB::commit();

            session()->flash("success_message", "Student updated successfully.");
            return redirect()->route('student_search');
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->errorMessage = $e->getMessage();
        }
    }

    public function render()
    {
        $enumOptions = $this->getEnumValues('users', 'case_reverse');
        $year_type = $this->getEnumValues('users', 'year_type');

        return view('livewire.admin.student.student-edit', [
            'enumOptions' => $enumOptions,
            'year_type' => $year_type
        ])->layout('layouts.admin');
    }

    private function getEnumValues($table, $column)
    {
        $enumValues = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '$column'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $enumValues, $matches);
        $enumOptions = [];

        if (isset($matches[1])) {
            $enumOptions = explode(',', $matches[1]);
            $enumOptions = array_map(function ($value) {
                return trim($value, "'");
            }, $enumOptions);
        }

        return $enumOptions;
    }
}
