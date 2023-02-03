<?php

namespace App\Actions\GradeLevelAction;

use App\Models\GradeLevel;
use Lorisleiva\Actions\Concerns\AsAction;

class GradeLevelCreate
{
    use AsAction;

    protected $gradeLevel;

    public function __construct(GradeLevel $gradeLevel) {
        $this->gradeLevel = $gradeLevel;
    }

    public function handle($data)
    {
        return $this->gradeLevel->create($data->all());
    }
}
