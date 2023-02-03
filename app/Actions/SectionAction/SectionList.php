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
        return $this->sectionList($data->search, $data->orderBy, $data->paginate, $data->school_id);
    }

    public function sectionList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $perPage=10) 
    {
        $model = $this->section->orderBy('created_at', $orderBy);

        if ($school_id != 'null') {
            $model->where('school_id', $school_id);
        }

        if ($search) {
            $model->search($search);
        }

        if ($paginate == 'true') {
            return $model->with(['school', 'teacher', 'gradeLevel'])->paginate($perPage);
        } else {
            return $model->get();
        }
    }
}
