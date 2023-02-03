<?php

namespace App\Actions\UserAction;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Lorisleiva\Actions\Concerns\AsAction;

class UserLogin
{
    use AsAction;

    public function handle($data, $user)
    {
        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        return $user->createToken('Escuela')->accessToken;
    }
}
