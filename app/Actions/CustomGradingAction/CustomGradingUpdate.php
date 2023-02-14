<?php

namespace App\Actions\CustomGradingAction;

use App\Models\CustomGrading;
use App\Models\CustomGradingGradeLevel;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingUpdate
{
    use AsAction;

    protected $customGrading, $customGradingGradeLevel;

    public function __construct(CustomGrading $customGrading, CustomGradingGradeLevel $customGradingGradeLevel) {
        $this->customGrading = $customGrading;
        $this->customGradingGradeLevel = $customGradingGradeLevel;
    }

    public function handle($id, $data)
    {
        $this->customGrading->where('id', $id)->update([
            'school_id' => $data->school_id,
            'name' => $data->name,
            'type' => $data->type,
        ]);

        $this->customGradingGradeLevel->where('school_id', $data->school_id)->where('custom_grading_id', $id)->delete();

        foreach ($data->grade_level_ids as $value) {
            $this->customGradingGradeLevel->create([
                'school_id' => $data->school_id,
                'custom_grading_id' => $id,
                'grade_level_id' => $value['value'],
            ]);
        }

        return null;
    }
}
