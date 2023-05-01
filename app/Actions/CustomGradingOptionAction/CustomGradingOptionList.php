<?php

namespace App\Actions\CustomGradingOptionAction;

use App\Models\CustomGradingOption;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingOptionList
{
    use AsAction;

    protected $customGradingOption;

    public function __construct(CustomGradingOption $customGradingOption) {
        $this->customGradingOption = $customGradingOption;
    }

    public function handle($data)
    {
        return $this->customGradingOptionList($data->search, $data->orderBy, $data->paginate, $data->school_id, $data->custom_grading_id);
    }

    public function customGradingOptionList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $custom_grading_id=null, $perPage=10) 
    {
        $model = $this->customGradingOption
                ->where('school_id', $school_id)
                ->where('custom_grading_id', $custom_grading_id)
                ->orderBy('created_at', $orderBy);

        if ($search) {
            $model->search($search);
        }

        if ($paginate == 'true') {
            return $model->paginate($perPage);
        } else {
            return $model->get();
        }
    }
}
