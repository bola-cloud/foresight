<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $req)
    {
        $messages = [
            'unique' => 'انت مسجل من قبل',
            'required' => 'هذا الحقل مطلوب',
            'email' => 'يجب أن يكون بريدًا إلكترونيًا صالحًا',
        ];

        $validator = Validator::make($req->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'], // Password validation
            'device_id' => ['required', 'string', 'unique:users'], // Exception for device_id
        ], $messages);

        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'status' => false,
                'data' => null
            ], 400);
        }

        // Create user
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'device_id' => $req->device_id, // Save device_id
        ]);

        // Generate token
        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'message' => 'تم التسجيل بنجاح',
            'status' => true,
            'data' => $user,
            'token' => $token
        ], 200);
    }
    
    //login

    public function login(Request $req)
    {
        $fields = $req->validate([
            'student_code' => 'required',
        ]);

        $user = User::where('student_code', $req->student_code)->first();
        if (!$user) {
            return response(
                [
                    'message' => 'رقم الموبايل خطا ',
                    'status' => false,
                    'data' => null
                ],
                401
            );
        }

        // Generate a new remember token if it doesn’t already exist
        if ($user->remember_token == null) {
            $user->remember_token = Str::random(60); // Generate a random token
            $user->save();
        }

        // Generate a new access token
        $token = $user->createToken('myapptoken')->plainTextToken;

        return response(
            [
                'message' => 'تم الدخول بنجاح ',
                'status' => true,
                'data' => [
                    'user' => $user,
                    'remember_token' => $user->remember_token // Return the remember_token
                ],
                'token' => $token,
            ],
            200
        );
    }

    public function check($id)
    {
        // Find the user by ID
        $user = User::find($id);
    
        if ($user) {
            // Return the user if found
            return response()->json([
                'status' => true,
                'message' => 'User found',
                'data' => $user,
            ]);
        } else {
            // Return a response if the user is not found
            return response()->json(['message' => 'المستخدم غير موجود'], 404);
        }
    }    

    public function logout(Request $req){

        if ($req->user()) {
            $req->user()->tokens()->delete();
        }
        return response()->json(['message' => 'logout'], 200);
    }

}