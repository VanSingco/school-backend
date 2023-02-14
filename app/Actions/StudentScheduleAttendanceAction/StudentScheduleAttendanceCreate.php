<?php

namespace App\Actions\StudentScheduleAttendanceAction;

use App\Models\StudentScheduleAttendance;
use Lorisleiva\Actions\Concerns\AsAction;

class StudentScheduleAttendanceCreate
{
    use AsAction;

    protected $studentScheduleAttendance;

    public function __construct(StudentScheduleAttendance $studentScheduleAttendance) {
        $this->studentScheduleAttendance = $studentScheduleAttendance;
    }

    public function handle()
    {
        // ...
    }
}
