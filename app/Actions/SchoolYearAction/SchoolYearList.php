<?php

namespace App\Actions\SchoolYearAction;

use App\Models\SchoolYear;
use Lorisleiva\Actions\Concerns\AsAction;

class SchoolYearList
{
    use AsAction;

    protected $schoolYear;

    public function __construct(SchoolYear $schoolYear) {
        $this->schoolYear = $schoolYear;
    }

    public function handle($data)
    {
        return $this->schoolYearList($data->search, $data->orderBy, $data->paginate, $data->school_id);
    }

    public function schoolYearList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $perPage=10) 
    {
        $model = $this->schoolYear->orderBy('created_at', $orderBy);

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
