<?php

namespace App\Actions\SubjectAction;

use App\Models\Subject;
use Lorisleiva\Actions\Concerns\AsAction;

class SubjectList
{
    use AsAction;

    protected $subject;

    public function __construct(Subject $subject) {
        $this->subject = $subject;
    }

    public function handle($data)
    {
        return $this->subjectList($data->search, $data->orderBy, $data->paginate, $data->school_id);
    }

    public function subjectList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $perPage=10) 
    {
        $model = $this->subject->orderBy('created_at', $orderBy);

        if ($school_id != 'null') {
            $model->where('school_id', $school_id);
        }

        if ($search) {
            $model->search($search);
        }

        if ($paginate == 'true') {
            return $model->with(['parentSubject', 'school'])->paginate($perPage);
        } else {
            return $model->get();
        }
    }
}
