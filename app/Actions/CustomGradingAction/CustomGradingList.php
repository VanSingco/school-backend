<?php

namespace App\Actions\CustomGradingAction;

use App\Models\CustomGrading;
use App\Models\CustomGradingGradeLevel;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingList
{
    use AsAction;

    protected $customGrading, $customGradingGradeLevel;

    public function __construct(CustomGrading $customGrading) {
        $this->customGrading = $customGrading;
    }

    public function handle($data)
    {
        return $this->customGradingList($data->search, $data->orderBy, $data->paginate, $data->school_id);
    }

    public function customGradingList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $perPage=10) 
    {
        $model = $this->customGrading->orderBy('created_at', $orderBy);

        if ($school_id != 'null') {
            $model->where('school_id', $school_id);
        }

        if ($search) {
            $model->search($search);
        }

        if ($paginate == 'true') {
            return $model->with(['customGradingGradeLevels'])->paginate($perPage);
        } else {
            return $model->with(['customGradingGradeLevels'])->get();
        }
    }
}
