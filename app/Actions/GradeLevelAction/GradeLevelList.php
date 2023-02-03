<?php

namespace App\Actions\GradeLevelAction;

use App\Models\GradeLevel;
use Lorisleiva\Actions\Concerns\AsAction;

class GradeLevelList
{
    use AsAction;

    protected $gradeLevel;

    public function __construct(GradeLevel $gradeLevel) {
        $this->gradeLevel = $gradeLevel;
    }


    public function handle($data)
    {
        return $this->gradeLevelList($data->search, $data->orderBy, $data->paginate, $data->school_id);
    }

    public function gradeLevelList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $perPage=10) 
    {
        
        $model = $this->gradeLevel->orderBy('created_at', $orderBy);

        if ($school_id != 'null') {
            $model->where('school_id', $school_id);
        }

        if ($search) {
            $model->search($search);
        }

        if ($paginate == 'true') {
            return $model->with(['school'])->paginate($perPage);
        } else {
            return $model->get();
        }
    }
}
