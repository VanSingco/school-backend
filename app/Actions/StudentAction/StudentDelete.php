<?php

namespace App\Actions\StudentAction;

use App\Models\Student;
use Lorisleiva\Actions\Concerns\AsAction;

class StudentDelete
{
    use AsAction;

    protected $student;

    public function __construct(Student $student) {
        $this->student = $student;
    }

    public function handle($id)
    {
        $model = $this->student->find($id);
        $model->delete();

        return $model;
    }
}
