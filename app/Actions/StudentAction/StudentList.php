<?php

namespace App\Actions\StudentAction;

use App\Models\Student;
use Lorisleiva\Actions\Concerns\AsAction;

class StudentList
{
    use AsAction;

    protected $student;

    public function __construct(Student $student) {
        $this->student = $student;
    }

    public function handle($data)
    {
        return $this->studentList($data->search, $data->orderBy, $data->paginate, $data->school_id);
    }

    public function studentList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $perPage=10) 
    {
        $model = $this->student->orderBy('created_at', $orderBy);

        if ($school_id != 'null') {
            $model->where('school_id', $school_id);
        }

        if ($search) {
            $model->search($search);
        }

        if ($paginate == 'true') {
            return $model->with(['gradeLevel', 'schoolYear', 'school'])->paginate($perPage);
        } else {
            return $model->get();
        }
    }
}
