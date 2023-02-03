<?php

namespace App\Actions\AssignSubjectScheduleAction;

use App\Models\AssignSubjectSchedule;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignSubjectScheduleDelete
{
    use AsAction;

    protected $assignSubjectSchedule;

    public function __construct(AssignSubjectSchedule $assignSubjectSchedule) {
        $this->assignSubjectSchedule = $assignSubjectSchedule;
    }

    public function handle($id)
    {
        $model = $this->assignSubjectSchedule->find($id);
        $model->delete();

        return $model;
    }
}
