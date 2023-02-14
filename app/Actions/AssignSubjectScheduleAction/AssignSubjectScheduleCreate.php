<?php

namespace App\Actions\AssignSubjectScheduleAction;

use App\Models\AssignSubjectSchedule;
use App\Models\AssignSubjectScheduleDayTime;
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
        // This will create assign subject schedule
        $schedule =  $this->assignSubjectSchedule->create([
            'school_id' => $data->school_id,
            'section_id' => $data->section_id,
            'assign_subject_id' => $data->assign_subject_id,
            'teacher_id' => $data->teacher_id,
            'classroom_name' => $data->classroom_name,
        ]);
        // create a list of days and times that belongs to assign schedule
        foreach ($data->day_time_schedules as $value) {
           AssignSubjectScheduleDayTime::create([
                'school_id' => $data->school_id,
                'assign_subject_schedule_id' => $schedule->id,
                'day' => $value['day'],
                'time_from' => $value['time_from'],
                'time_to' => $value['time_to'],
           ]);
        }

        return $schedule;
    }
}
