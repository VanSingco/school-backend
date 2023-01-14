<?php

namespace App\Services;

use App\Models\SchoolYear;

class SchoolYearService {

    protected $schoolYear;

    public function __construct(SchoolYear $schoolYear) {
        $this->schoolYear = $schoolYear;
    }

    public function schoolYearList($search='', $orderBy='DESC', $paginate='true', $perPage=10) 
    {
        if ($paginate == 'true') {
            $model = $this->schoolYear->orderBy('created_at', $orderBy)
                    ->paginate($perPage);
        } else {
            $model = $this->schoolYear->orderBy('created_at', $orderBy)->get();
        }

        return $model;
    }
    
    public function list($data)
    {
        return $this->schoolYearList($data->search, $data->orderBy, $data->paginate);
    }

    public function show($id)
    {
       return $this->schoolYear->find($id);
    }

    public function store($data)
    {
        return $this->schoolYear->create([
            'from' => $data->from,
            'to' => $data->to,
            'school_year' => $data->from.'-'.$data->to,
            'is_active' => $data->is_active,
        ]);
    }

    public function update($id, $data)
    {
        return $this->schoolYear->where('id', $id)->update([
            'from' => $data->from,
            'to' => $data->to,
            'school_year' => $data->from.'-'.$data->to,
            'is_active' => $data->is_active,
        ]);
    }

    public function delete($id)
    {
        $model = $this->schoolYear->find($id);
        $model->delete();

        return $model;
    }
}