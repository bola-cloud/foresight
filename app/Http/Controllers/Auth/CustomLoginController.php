<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Ensure this view path matches your actual view path
    }

    public function login(Request $request)
    {
        $request->validate([
            'mobile_phone' => 'required|string',
        ]);

        $user = User::where('mobile_phone', $request->mobile_phone)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->intended('home_admin'); // Adjust redirect as needed
        }

        return back()->withErrors(['mobile_phone' => 'The provided credentials do not match our records.']);
    }
}
