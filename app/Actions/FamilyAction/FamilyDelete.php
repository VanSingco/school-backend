<?php

namespace App\Actions\FamilyAction;

use App\Models\Family;
use Lorisleiva\Actions\Concerns\AsAction;

class FamilyDelete
{
    use AsAction;

    protected $family;

    public function __construct(Family $family) {
        $this->family = $family;
    }

    public function handle($id)
    {
        $model = $this->family->find($id);
        $model->delete();

        return $model;
    }
}
