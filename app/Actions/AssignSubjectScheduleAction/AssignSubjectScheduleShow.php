<?php

namespace App\Actions\AssignSubjectScheduleAction;

use App\Models\AssignSubjectSchedule;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignSubjectScheduleShow
{
    use AsAction;

    protected $assignSubjectSchedule;

    public function __construct(AssignSubjectSchedule $assignSubjectSchedule) {
        $this->assignSubjectSchedule = $assignSubjectSchedule;
    }

    public function handle($id)
    {
        return $this->assignSubjectSchedule->where('id', $id)->with(['teacher', 'assignSubject', 'section', 'dayTimeSchedules'])->first();
    }
}
