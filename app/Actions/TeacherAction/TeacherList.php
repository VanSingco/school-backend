<?php

namespace App\Actions\TeacherAction;

use App\Models\Teacher;
use Lorisleiva\Actions\Concerns\AsAction;

class TeacherList
{
    use AsAction;

    protected $teacher;

    public function __construct(Teacher $teacher) {
        $this->teacher = $teacher;
    }

    public function handle($data)
    {
        return $this->teacherList($data->search, $data->orderBy, $data->paginate, $data->school_id);
    }

    public function teacherList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $perPage=10) 
    {
        $model = $this->teacher->orderBy('created_at', $orderBy);

        if ($school_id != 'null') {
            $model->where('school_id', $school_id);
        }

        if ($search) {
            $model->search($search);
        }

        if ($paginate == 'true') {
            return $model->with(['school'])->paginate($perPage);
        } else {
            return $model->get();
        }
    }
}
