<?php

namespace App\Actions\UserAction;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class UserList
{
    use AsAction;

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function handle($data)
    {
        return $this->userList($data->search, $data->user_type, $data->orderBy, $data->paginate);
    }

    public function userList($search='', $user_type='super-admin', $orderBy='ASC', $paginate='true', $perPage=10) 
    {
        if ($paginate == 'true') {
            $model = $this->user->where('user_type', $user_type)->search($search)
                    ->with(['school'])
                    ->orderBy('name', $orderBy)
                    ->paginate($perPage);
        } else {
            $model = $this->user->where('user_type', $user_type)->orderBy('name', 'ASC')->get();
        }

        return $model;
    }
}
