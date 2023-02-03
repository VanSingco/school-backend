<?php

namespace App\Actions\GradeLevelAction;

use App\Models\GradeLevel;
use Lorisleiva\Actions\Concerns\AsAction;

class GradeLevelShow
{
    use AsAction;

    protected $gradeLevel;

    public function __construct(GradeLevel $gradeLevel) {
        $this->gradeLevel = $gradeLevel;
    }


    public function handle($id)
    {
       return $this->gradeLevel->find($id);
    }
}
