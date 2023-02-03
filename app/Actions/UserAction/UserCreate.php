<?php

namespace App\Actions\UserAction;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class UserCreate
{
    use AsAction;

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function handle($data)
    {
        $user_data = $data->all();
        $user_data['password'] = Hash::make($user_data['password']);
        return $this->user->create($user_data);
    }
}
