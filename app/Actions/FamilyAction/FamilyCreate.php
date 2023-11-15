<?php

namespace App\Actions\FamilyAction;

use App\Models\Family;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class FamilyCreate
{
    use AsAction;

    protected $family, $user;

    public function __construct(Family $family, User $user) {
        $this->family = $family;
        $this->user = $user;
    }

    public function handle($data)
    {
        $family_data = $data->all();

        $user = $this->user->create([
            'name' => $family_data['primary_contact_person'],
            'email' => $family_data['primary_contact_email'],
            'password' => Hash::make($family_data['primary_contact_number']),
            'user_type' => 'family'
        ]);

        $family_data['user_id'] = $user->id;

        return $this->family->create($family_data);
    }
}
