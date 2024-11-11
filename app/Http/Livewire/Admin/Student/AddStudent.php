<?php
namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AddStudent extends Component
{
    public $errorMessage, $code, $name, $year, $mobile_father, $case = null, $mobile_phone;

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

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|string|in:ONE,TWO,THREE',
            'mobile_father' => 'required|string|max:15',
            'code' => 'required|string|max:50',
            'mobile_phone' => 'required|string|size:11|unique:users,mobile_phone',
        ]);

        try {
            DB::beginTransaction();

            $new_user = new User();
            $new_user->name = $this->name;
            $new_user->year_type = $this->year;
            $new_user->mobile_father = $this->mobile_father;
            $new_user->student_code = $this->code;
            $new_user->mobile_phone = $this->mobile_phone;
            $new_user->wallet = 0;
            $new_user->save();

            $this->finish();
            DB::commit();

            session()->flash("success_message", "You have added a new student.");
            return redirect()->route('student_search');
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->errorMessage = $e->getMessage();
        }
    }

    public function finish()
    {
        $this->code = null;
        $this->name = null;
        $this->year = null;
        $this->mobile_father = null;
        $this->case = null;
        $this->mobile_phone = null;
    }

    public function render()
    {
        $enumOptions = $this->getEnumValues('users', 'case_reverse');
        $year_type = $this->getEnumValues('users', 'year_type');

        return view('livewire.admin.student.add-student', [
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
