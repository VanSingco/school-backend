<?php

namespace App\Actions\StudentAction;

use App\Models\Student;
use Lorisleiva\Actions\Concerns\AsAction;

class StudentShow
{
    use AsAction;

    protected $student;

    public function __construct(Student $student) {
        $this->student = $student;
    }

    public function handle($id)
    {
       return $this->student->where('id', $id)->with([
        'gradeLevel', 
        'schoolYear', 
        'lastGradeLevel', 
        'lastSchoolYear', 
        'school'])->first();
    }
}
