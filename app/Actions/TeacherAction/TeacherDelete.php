<?php

namespace App\Actions\TeacherAction;

use App\Models\Teacher;
use Lorisleiva\Actions\Concerns\AsAction;

class TeacherDelete
{
    use AsAction;

    protected $teacher;

    public function __construct(Teacher $teacher) {
        $this->teacher = $teacher;
    }

    public function handle($id)
    {
        $model = $this->teacher->find($id);
        $model->delete();

        return $model;
    }
}
