<?php

namespace App\Actions\CustomGradingAction;

use App\Models\CustomGrading;
use App\Models\CustomGradingGradeLevel;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingCreate
{
    use AsAction;

    protected $customGrading, $customGradingGradeLevel;

    public function __construct(CustomGrading $customGrading, CustomGradingGradeLevel $customGradingGradeLevel) {
        $this->customGrading = $customGrading;
        $this->customGradingGradeLevel = $customGradingGradeLevel;
    }

    public function handle($data)
    {
        $customGrading = $this->customGrading->create([
            'school_id' => $data->school_id,
            'name' => $data->name,
            'type' => $data->type,
        ]);

        foreach ($data->grade_level_ids as $value) {
            $this->customGradingGradeLevel->create([
                'school_id' => $data->school_id,
                'custom_grading_id' => $customGrading->id,
                'grade_level_id' => $value['value'],
            ]);
        }

        return $customGrading;
    }
}
