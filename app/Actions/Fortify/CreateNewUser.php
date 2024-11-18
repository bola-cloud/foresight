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
            'mobile_phone' => ['required', 'numeric', 'unique:users'],
            'device_id' => ['required', 'string'],
            'password' => $this->passwordRules(), // Use the predefined password validation rules
        ])->validate();        

        return User::create([
            'name' => $input['name'],
            'mobile_phone' => $input['mobile_phone'],
            'device_id' => $input['device_id'],
            'wallet' => "0",
            'password' => Hash::make($input['password']), // Hash the password
        ]);        
    }
}
