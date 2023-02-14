<?php

namespace App\Actions\StudentScheduleAttendanceAction;

use App\Models\StudentScheduleAttendance;
use Lorisleiva\Actions\Concerns\AsAction;

class StudentScheduleAttendanceList
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
