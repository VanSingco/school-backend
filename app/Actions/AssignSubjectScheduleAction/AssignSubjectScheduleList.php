<?php

namespace App\Actions\AssignSubjectScheduleAction;

use App\Models\AssignSubjectSchedule;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignSubjectScheduleList
{
    use AsAction;

    protected $assignSubjectSchedule;

    public function __construct(AssignSubjectSchedule $assignSubjectSchedule) {
        $this->assignSubjectSchedule = $assignSubjectSchedule;
    }

    public function handle($data)
    {
        return $this->assignSubjectScheduleList($data->search, $data->orderBy, $data->paginate, $data->assign_subject_id, $data->school_id);
    }

    public function assignSubjectScheduleList($search='', $orderBy='DESC', $paginate='true', $assign_subject_id=null, $school_id=null, $perPage=10) 
    {
        $model = $this->assignSubjectSchedule->orderBy('created_at', $orderBy);

        if ($school_id != 'null') {
            $model->where('school_id', $school_id);
        }

        if ($assign_subject_id == 'null') {
            $model->where('assign_subject_id', $assign_subject_id);
        }

        if ($search) {
            $model->search($search);
        }

        if ($paginate == 'true') {
            return $model->with(['teacher', 'assignSubject', 'section', 'dayTimeSchedules'])->paginate($perPage);
        } else {
            return $model->get();
        }
    }
}
