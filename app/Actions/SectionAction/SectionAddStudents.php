<?php

namespace App\Actions\SectionAction;

use App\Models\SchoolYear;
use App\Models\SectionStudent;
use Illuminate\Validation\ValidationException;
use Lorisleiva\Actions\Concerns\AsAction;

class SectionAddStudents
{
    use AsAction;

    protected $sectionStudent, $schoolYear;

    public function __construct(SectionStudent $sectionStudent, SchoolYear $schoolYear) {
        $this->sectionStudent = $sectionStudent;
        $this->schoolYear = $schoolYear;
    }

    public function handle($data)
    {
        // Get the active school year and automatically assign the section student
        $schoolYear = $this->schoolYear->where('is_active', 1)->first();
        // Check if the student is already has a section assigned
        $sectionStudentsExist = $this->sectionStudent->where('section_id', $data->section_id)
                                ->whereIn('student_id', $data->student_id)->get();
        // throw an error if student has already been assigned a section
        if (count($sectionStudentsExist) > 0) {
            $studentExistInSection = [];
            foreach ($sectionStudentsExist as $value) {
                $studentExistInSection[$value->id] = ["{$value->student->first_name} is already in the {$value->section->name} Section"];
            }
            
            throw ValidationException::withMessages($studentExistInSection);

            return null;
        } else {
             // add students to section
            foreach ($data->student_id as $student_id) {

                $this->sectionStudent->create([
                    'school_id' => $data->school_id,
                    'section_id' => $data->section_id,
                    'student_id' => $student_id,
                    'school_year_id' => $schoolYear->id
                ]);
            }
            
            return null;
        }
       
    }
}
