<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'mobile_phone' => ['required', 'numeric','unique:users'],
            'mobile_father' => ['required', 'numeric','unique:users'],
            'device_id' => ['required', 'string'],
            'year_type' => ['required', 'string'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'mobile_phone' => $input['mobile_phone'],
            'mobile_father' => $input['mobile_father'],
            'device_id' => $input['device_id'],
            'year_type' => $input['year_type'],
        ]);
    }
}
