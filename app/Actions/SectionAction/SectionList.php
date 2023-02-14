<?php

namespace App\Actions\SectionAction;

use App\Models\Section;
use Lorisleiva\Actions\Concerns\AsAction;

class SectionList
{
    use AsAction;

    protected $section;

    public function __construct(Section $section) {
        $this->section = $section;
    }

    public function handle($data)
    {
        return $this->sectionList($data->search, $data->orderBy, $data->paginate, $data->school_id, $data->grade_level_id);
    }

    public function sectionList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $grade_level_id=null, $perPage=10) 
    {
        $model = $this->section->orderBy('created_at', $orderBy);

        if ($school_id != 'null') {
            $model->where('school_id', $school_id);
        }

        if ($grade_level_id != 'null') {
            $model->where('grade_level_id', $grade_level_id);
        }

        if ($search) {
            $model->search($search);
        }

        if ($paginate == 'true') {
            return $model->with(['school', 'teacher', 'gradeLevel', 'sectionStudents'])->paginate($perPage);
        } else {
            return $model->with(['school', 'teacher', 'gradeLevel'])->get();
        }
    }
}
