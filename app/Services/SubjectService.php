<?php

namespace App\Services;

use App\Models\Subject;

class SubjectService {

    protected $subject;

    public function __construct(Subject $subject) {
        $this->subject = $subject;
    }

    public function subjectList($search='', $orderBy='DESC', $paginate='true', $perPage=10) 
    {
        if ($paginate == 'true') {
            $model = $this->subject->search($search)
                    ->with(['parentSubject'])
                    ->orderBy('created_at', $orderBy)
                    ->paginate($perPage);
        } else {
            $model = $this->subject->search($search)
                ->orderBy('created_at', $orderBy)->get();
        }

        return $model;
    }
    
    public function list($data)
    {
        return $this->subjectList($data->search, $data->orderBy, $data->paginate);
    }

    public function show($id)
    {
       return $this->subject->find($id);
    }

    public function store($data)
    {
        return $this->subject->create($data->all());
    }

    public function update($id, $data)
    {
        return $this->subject->where('id', $id)->update([
            'name' => $data->name,
            'type' => $data->type,
            'parent_subject_id' => $data->parent_subject_id,
            'ww' => $data->ww,
            'qa' => $data->qa,
            'pt' => $data->pt,
        ]);
    }

    public function delete($id)
    {
        $model = $this->subject->find($id);
        $model->delete();

        return $model;
    }
}