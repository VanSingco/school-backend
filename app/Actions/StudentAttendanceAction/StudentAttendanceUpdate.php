<?php

namespace App\Actions\StudentAttendanceAction;

use App\Models\StudentAttendance;
use Lorisleiva\Actions\Concerns\AsAction;

class StudentAttendanceUpdate
{
    use AsAction;

    protected $studentAttendance;

    public function __construct(StudentAttendance $studentAttendance) {
        $this->studentAttendance = $studentAttendance;
    }

    public function handle()
    {
        // ...
    }
}
