<?php

namespace App\Actions\CustomGradingAction;

use App\Models\CustomGrading;
use App\Models\CustomGradingGradeLevel;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingDelete
{
    use AsAction;

    protected $customGrading, $customGradingGradeLevel;

    public function __construct(CustomGrading $customGrading, CustomGradingGradeLevel $customGradingGradeLevel) {
        $this->customGrading = $customGrading;
        $this->customGradingGradeLevel = $customGradingGradeLevel;
    }

    public function handle($id)
    {
        $model = $this->customGrading->find($id);
        
        $this->customGradingGradeLevel->where('custom_grading_id', $id)->delete();

        $model->delete();

        return $model;
    }
}
