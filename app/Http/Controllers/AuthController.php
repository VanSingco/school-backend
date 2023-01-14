<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected $authService;
    
    function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    
    // This will login the user with token
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user) {
            if ($user->user_type == 'super-admin') {
                throw ValidationException::withMessages([
                    'no_permission' => ["You don't have permission to login to this portal."],
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'not_found' => ['Account not found.'],
            ]);
        }

        $token = $this->authService->login($validated);

        return response()->json($token, 200);
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

        $token = $this->authService->login($validated);

        return response()->json($token, 200);
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