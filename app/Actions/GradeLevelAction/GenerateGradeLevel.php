<?php

namespace App\Actions\GradeLevelAction;

use App\Models\GradeLevel;
use Lorisleiva\Actions\Concerns\AsAction;

class GenerateGradeLevel
{
    use AsAction;

    protected $gradeLevel;

    public function __construct(GradeLevel $gradeLevel) {
        $this->gradeLevel = $gradeLevel;
    }


    public function handle($type, $schoo_id)
    {
        $curricular_offering = [
            'elementary' => ['Kindergarten', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6'],
            'lower-secondary' => ['Garde 7', 'Grade 8', 'Grade 9', 'Grade 10'],
            'upper-secondary' => ['Grades 11', 'Grade 12'],
            'elementary-lower-secondary' => ['Kindergarten', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6', 'Garde 7', 'Grade 8', 'Grade 9', 'Grade 10'],
            'lower-secondary-upper-secondary' => ['Garde 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grades 11', 'Grade 12'],
            'elementary-lower-secondary-upper-secondary' => ['Kindergarten', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6', 'Garde 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grades 11', 'Grade 12'],
        ];

        foreach ($curricular_offering[$type] as $value) {
            $this->gradeLevel->updateOrCreate(['school_id' => $schoo_id,'name' => $value]);
        }
    }
}
