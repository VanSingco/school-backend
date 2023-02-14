<?php

namespace App\Actions\FamilyAction;

use App\Models\Family;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;
use phpDocumentor\Reflection\Types\This;

class FamilyUpdate
{
    use AsAction;

    protected $family, $user;

    public function __construct(Family $family, User $user) {
        $this->family = $family;
        $this->user = $user;
    }

    public function handle($id, $data)
    {

        $familyData = $data->all();

        $family = $this->family->find($id);

        $this->user->where('id', $family->user_id)->update([
            'name' => $familyData['primary_contact_person'],
            'email' => $familyData['primary_contact_email'],
            'password' => Hash::make($familyData['primary_contact_number']),
            'user_type' => 'family'
        ]);

        return $this->family->where('id', $id)->update($familyData);
    }
}
