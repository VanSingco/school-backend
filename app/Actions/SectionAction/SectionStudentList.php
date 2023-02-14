<?php

namespace App\Actions\SectionAction;

use App\Models\Section;
use App\Models\SectionStudent;
use App\Models\Student;
use Lorisleiva\Actions\Concerns\AsAction;

class SectionStudentList
{
    use AsAction;

    protected $section, $sectionStudent, $student;

    public function __construct(Section $section, SectionStudent $sectionStudent, Student $student) {
        $this->section = $section;
        $this->sectionStudent = $sectionStudent;
        $this->student = $student;
    }

    public function handle($data)
    {
        // Get the section
        $section =  $this->section->find($data->id);
        // Get all the student ids in the sectionStudent that bellongs to the section and format to array.
        $model = $this->sectionStudent->where('section_id', $section->id);

        if ($data->search) {
            $model->whereHas('student', function($q) use ($data) {
                $q->where('last_name', 'like', '%' . $data->search . '%')
                    ->orWhere('first_name', 'like', '%' . $data->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $data->search . '%')
                    ->orWhere('status', 'like', '%' . $data->search . '%')
                    ->orWhere('number', 'like', '%' . $data->search . '%');
            });
        }

        if ($data->paginate == 'true') {
            return $model->paginate(10);
        } else {
            return $model->get();
        }

    }
}
