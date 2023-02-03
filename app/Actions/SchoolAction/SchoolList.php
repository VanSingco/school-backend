<?php

namespace App\Actions\SchoolAction;

use App\Models\School;
use Lorisleiva\Actions\Concerns\AsAction;

class SchoolList
{
    use AsAction;

    protected $school;

    public function __construct(School $school) {
        $this->school = $school;
    }

    public function handle($data)
    {
        return $this->schoolList($data->search, $data->orderBy, $data->paginate);
    }


    public function schoolList($search='', $orderBy='DESC', $paginate='true', $perPage=10) 
    {
        
        if ($paginate == 'true') {
            $model = $this->school->search($search)
                    ->orderBy('created_at', $orderBy)
                    ->paginate($perPage);
        } else {
            $model = $this->school->where('status', 'approved')->orderBy('name', 'ASC')->get();
        }

        return $model;
    }
}
