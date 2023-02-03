<?php

namespace App\Actions\UserAction;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class UserShow
{
    use AsAction;

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function handle($id)
    {
        return $this->user->find($id);
    }
}
