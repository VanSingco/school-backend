<?php

namespace App\Actions\GradeLevelAction;

use App\Models\GradeLevel;
use Lorisleiva\Actions\Concerns\AsAction;

class GradeLevelDelete
{
    use AsAction;

    protected $gradeLevel;

    public function __construct(GradeLevel $gradeLevel) {
        $this->gradeLevel = $gradeLevel;
    }


    public function handle($id)
    {
        $model = $this->gradeLevel->find($id);
        $model->delete();

        return $model;
    }
}
