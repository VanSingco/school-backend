<?php

namespace App\Services;

use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SchoolService {

    protected $school, $user, $uploadService;

    public function __construct(School $school, UploadService $uploadService) {
        $this->school = $school;
        $this->uploadService = $uploadService;
    }

    public function schoolList($search='', $orderBy='DESC', $paginate='true', $perPage=10) 
    {
        if ($paginate == 'true') {
            $model = $this->school->search($search)
                    ->orderBy('created_at', $orderBy)
                    ->paginate($perPage);
        } else {
            $model = $this->school->search($search)
                ->orderBy('created_at', $orderBy)->get();
        }

        return $model;
    }
    
    public function list($data)
    {
        return $this->schoolList($data->search, $data->orderBy, $data->paginate);
    }

    public function show($id)
    {
       return $this->school->find($id);
    }

    public function store($data)
    {
        $schoolData = $data->all();

        $school_folder_name = str_replace("_", " ", strtolower($schoolData['name']));

        // upload school picture
        if ($data->hasFile('logo') && $data->file('logo')) {
            $schoolData['logo'] = $this->uploadService->upload($data->file('logo'), "/school/$school_folder_name/logo");
        }

        $school = $this->school->create($schoolData);

        return $school;
    }

    public function update($id, $data)
    {
        $schoolData = $data->all();

        $school_folder_name = str_replace("_", " ", strtolower($schoolData['name']));

        $this->user->where('user_id', $data->user_id)->update([
            'name' => $data->first_name,
            'email' => $data->email,
            'password' => Hash::make($data->last_name),
        ]);

         // upload school picture
        if ($data->hasFile('logo') && $data->file('logo')) {
            $schoolData['logo'] = $this->uploadService->upload($data->file('logo'), "/school/$school_folder_name/logo");
        }

        return $this->school->where('id', $id)->update($schoolData);
    }

    public function delete($id)
    {
        $model = $this->school->find($id);
        $model->delete();

        return $model;
    }
}