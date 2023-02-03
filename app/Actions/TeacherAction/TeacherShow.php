<?php

namespace App\Actions\TeacherAction;

use App\Models\Teacher;
use Lorisleiva\Actions\Concerns\AsAction;

class TeacherShow
{
    use AsAction;

    protected $teacher;

    public function __construct(Teacher $teacher) {
        $this->teacher = $teacher;
    }

    public function handle($id)
    {
       return $this->teacher->find($id);
    }
}
