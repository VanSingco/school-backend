<?php

namespace App\Actions\AssignSubjectScheduleAction;

use App\Models\AssignSubjectSchedule;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignSubjectScheduleCreate
{
    use AsAction;

    protected $assignSubjectSchedule;

    public function __construct(AssignSubjectSchedule $assignSubjectSchedule) {
        $this->assignSubjectSchedule = $assignSubjectSchedule;
    }

    public function handle($data)
    {
        return $this->assignSubjectSchedule->create($data->all());
    }
}
