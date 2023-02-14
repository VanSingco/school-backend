<?php

namespace App\Actions\AssignSubjectScheduleAction;

use App\Models\AssignSubjectSchedule;
use App\Models\AssignSubjectScheduleDayTime;
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
        // This will update the assign subject schedule data
        $this->assignSubjectSchedule->where('id', $id)->update([
            'school_id' => $data->school_id,
            'section_id' => $data->section_id,
            'assign_subject_id' => $data->assign_subject_id,
            'teacher_id' => $data->teacher_id,
            'classroom_name' => $data->classroom_name,
        ]);
        // This will delete all day time that belong to schedule
        AssignSubjectScheduleDayTime::where('school_id', $data->school_id)
                                ->where('assign_subject_schedule_id', $id)
                                ->delete();
        
        // create a new list of days and times that belongs to assign schedule
        foreach ($data->day_time_schedules as $value) {
            AssignSubjectScheduleDayTime::create([
                 'school_id' => $data->school_id,
                 'assign_subject_schedule_id' => $id,
                 'day' => $value['day'],
                 'time_from' => $value['time_from'],
                 'time_to' => $value['time_to'],
            ]);
        }

        return $id;
    }
}
