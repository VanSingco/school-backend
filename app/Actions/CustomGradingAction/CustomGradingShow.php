<?php

namespace App\Actions\CustomGradingAction;

use App\Models\CustomGrading;
use App\Models\CustomGradingGradeLevel;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingShow
{
    use AsAction;

    protected $customGrading;

    public function __construct(CustomGrading $customGrading) {
        $this->customGrading = $customGrading;
    }

    public function handle($id)
    {
        return $this->customGrading->where('id', $id)->with(['customGradingGradeLevels'])->first();
    }
}
