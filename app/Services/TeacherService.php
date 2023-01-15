<?php

namespace App\Services;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherService {

    protected $teacher, $user, $uploadService;

    public function __construct(Teacher $teacher, User $user, UploadService $uploadService) {
        $this->teacher = $teacher;
        $this->user = $user;
        $this->uploadService = $uploadService;
    }

    public function teacherList($search='', $orderBy='DESC', $paginate='true', $perPage=10) 
    {
        if ($paginate == 'true') {
            $model = $this->teacher->search($search)
                    ->orderBy('created_at', $orderBy)
                    ->paginate($perPage);
        } else {
            $model = $this->teacher->search($search)
                ->orderBy('created_at', $orderBy)->get();
        }

        return $model;
    }
    
    public function list($data)
    {
        return $this->teacherList($data->search, $data->orderBy, $data->paginate);
    }

    public function show($id)
    {
       return $this->teacher->find($id);
    }

    public function store($data)
    {
        $teacherData = $data->all();
        // create a user teacher
        $user = $this->user->create([
            'name' => $data->first_name,
            'email' => $data->email,
            'password' => Hash::make($data->last_name),
            'user_type' => 'teacher',
        ]);
        // store user id to teacher table
        $teacherData['user_id'] = $user->id;
        $teacherData['is_active'] =  $data->is_active == 'true' ? true : false;
        // upload techer picture
        if ($data->hasFile('picture') && $data->file('picture')) {
            $teacherData['picture'] = $this->uploadService->upload($data->file('picture'), '/teachers/picture');
        }

        return $this->teacher->create($teacherData);
    }

    public function update($id, $data)
    {
        $teacherData = $data->all();

        $this->user->where('user_id', $data->user_id)->update([
            'name' => $data->first_name,
            'email' => $data->email,
            'password' => Hash::make($data->last_name),
        ]);

         // upload techer picture
         if ($data->hasFile('picture') && $data->file('picture')) {
            $teacherData['picture'] = $this->uploadService->upload($data->file('picture'), '/teachers/picture');
        }

        return $this->teacher->where('id', $id)->update($teacherData);
    }

    public function delete($id)
    {
        $model = $this->teacher->find($id);
        $model->delete();

        return $model;
    }
}