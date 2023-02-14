<?php

namespace App\Http\Controllers;

use App\Actions\UserAction\UserLogin;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // This will login the user with token
    public function login(Request $request)
    {
        $validate_fields = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        if ($request->user_type == 'student') {
            $validate_fields = [
                'student_number' => 'required|numeric',
                'password' => 'required',
            ];
        }

        $validated = $request->validate($validate_fields);
        
        $user = null;

        if ($request->user_type == 'student') {
            $student = Student::where('number', $request->student_number)->first();
            if ($student) {
                $user = User::find($student->user_id);
            }
            
        } else {
            $user = User::where('email', $validated['email'])->first();
        }


        if ($user) {
            
            $school = School::where('subdomain', $request->subdomain)->first();

            if ($user->user_type == 'super-admin') {
                throw ValidationException::withMessages([
                    'no_permission' => ["You don't have permission to login to this portal."],
                ]);
            } else if ($school && $user->school_id !== $school->id) {
                throw ValidationException::withMessages([
                    'no_permission' => ["You don't have permission to login to this school portal."],
                ]);
            } else if (!$school) {
                throw ValidationException::withMessages([
                    'no_permission' => ["Something went wrong."],
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'not_found' => ['Account not found.'],
            ]);
        }

        $token = UserLogin::run($validated,  $user);

        return response()->json(['user' => $user, 'token' => $token], 200);
    }


    public function superAdminLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user) {
            if ($user->user_type !== 'super-admin') {
                throw ValidationException::withMessages([
                    'no_permission' => ["You don't have permission to login to this portal."],
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'not_found' => ['Account not found.'],
            ]);
        }

        $token = UserLogin::run($validated,  $user);

        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    // This will get the current user
    public function user(Request $request)
    {
        return $request->user();
    }

    public function logout()
    {
        return response()->json(Auth::guard('web')->logout(), 200);
    }
}
