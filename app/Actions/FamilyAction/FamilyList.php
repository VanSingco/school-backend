<?php

namespace App\Actions\FamilyAction;

use App\Models\Family;
use Lorisleiva\Actions\Concerns\AsAction;

class FamilyList
{
    use AsAction;

    protected $family;

    public function __construct(Family $family) {
        $this->family = $family;
    }

    public function handle($data)
    {
        return $this->familyList($data->search, $data->orderBy, $data->paginate, $data->school_id);
    }

    public function familyList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $perPage=10) 
    {
        $model = $this->family->orderBy('created_at', $orderBy);

        if ($school_id != 'null') {
            $model->where('school_id', $school_id);
        }

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
