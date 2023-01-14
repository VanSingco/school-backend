<?php

namespace App\Services;

use App\Models\GradeLevel;

class GradeLevelService {

    protected $gradeLevel;

    public function __construct(GradeLevel $gradeLevel) {
        $this->gradeLevel = $gradeLevel;
    }

    public function gradeLevelList($search='', $orderBy='DESC', $paginate='true', $perPage=10) 
    {
        if ($paginate == 'true') {
            $model = $this->gradeLevel->search($search)
                    ->orderBy('created_at', $orderBy)
                    ->paginate($perPage);
        } else {
            $model = $this->gradeLevel->search($search)
                ->orderBy('created_at', $orderBy)->get();
        }

        return $model;
    }
    
    public function list($data)
    {
        return $this->gradeLevelList($data->search, $data->orderBy, $data->paginate);
    }

    public function show($id)
    {
       return $this->gradeLevel->find($id);
    }

    public function store($data)
    {
        return $this->gradeLevel->create($data->all());
    }

    public function update($id, $data)
    {
        return $this->gradeLevel->where('id', $id)->update(['name' => $data->name]);
    }

    public function delete($id)
    {
        $model = $this->gradeLevel->find($id);
        $model->delete();

        return $model;
    }
}