<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Ensure this view path matches your actual view path
    }

    public function login(Request $request)
    {
        // Validate both mobile phone and password
        $request->validate([
            'mobile_phone' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Retrieve the user by mobile phone
        $user = User::where('mobile_phone', $request->mobile_phone)->first();
    
        // Check if the user exists and the password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);
    
            // Redirect to the intended page or home_admin
            return redirect()->route('home_admin');
        }
    
        // If authentication fails, return back with an error
        return back()->withErrors(['mobile_phone' => 'The provided credentials do not match our records.']);
    }
}
