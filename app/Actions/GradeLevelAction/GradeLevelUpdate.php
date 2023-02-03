<?php

namespace App\Actions\GradeLevelAction;

use App\Models\GradeLevel;
use Lorisleiva\Actions\Concerns\AsAction;

class GradeLevelUpdate
{
    use AsAction;

    protected $gradeLevel;

    public function __construct(GradeLevel $gradeLevel) {
        $this->gradeLevel = $gradeLevel;
    }

    public function handle($id, $data)
    {
        return $this->gradeLevel->where('id', $id)->update($data->all());
    }
}
