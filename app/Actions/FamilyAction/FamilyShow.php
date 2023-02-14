<?php

namespace App\Actions\FamilyAction;

use App\Models\Family;
use Lorisleiva\Actions\Concerns\AsAction;

class FamilyShow
{
    use AsAction;

    protected $family;

    public function __construct(Family $family) {
        $this->family = $family;
    }

    public function handle($id)
    {
        return $this->family->find($id);
    }
}
