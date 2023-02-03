<?php

namespace App\Actions\SchoolAction;

use App\Models\School;
use Lorisleiva\Actions\Concerns\AsAction;

class SchoolDelete
{
    use AsAction;

    protected $school;

    public function __construct(School $school) {
        $this->school = $school;
    }

    public function handle($id)
    {
        $model = $this->school->find($id);
        $model->delete();

        return $model;
    }
}
