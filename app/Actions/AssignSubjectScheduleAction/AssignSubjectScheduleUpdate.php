<?php

namespace App\Actions\AssignSubjectScheduleAction;

use App\Models\AssignSubjectSchedule;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignSubjectScheduleUpdate
{
    use AsAction;

    protected $assignSubjectSchedule;

    public function __construct(AssignSubjectSchedule $assignSubjectSchedule) {
        $this->assignSubjectSchedule = $assignSubjectSchedule;
    }

    public function handle($id, $data)
    {
        return $this->assignSubjectSchedule->where('id', $id)->update($data->all());
    }
}
