<?php

namespace App\Actions\TeacherAction;

use App\Actions\CustomAction\Upload;
use App\Models\School;
use App\Models\Teacher;
use App\Models\User;
use App\Services\UploadService;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class TeacherCreate
{
    use AsAction;

    protected $teacher, $user;

    public function __construct(Teacher $teacher, User $user) {
        $this->teacher = $teacher;
        $this->user = $user;
    }

    public function handle($data)
    {
        $teacherData = $data->all();
        // create a user student
        $user = $this->user->create([
            'name' => $data->first_name,
            'email' => $data->email,
            'password' => Hash::make(str_replace(' ', '', strtolower($data->last_name))),
            'school_id' => $data->school_id,
            'user_type' => 'teacher',
        ]);
        // store user id to teacher table
        $teacherData['user_id'] = $user->id;
        $teacherData['is_active'] =  $data->is_active == 'true' ? true : false;

        // upload techer picture
        if ($data->hasFile('picture') && $data->file('picture')) {
            $school = School::find($data->school_id);
            $school_folder_name = str_replace(" ", "-", strtolower($school->name));

            $teacherData['picture'] = Upload::run($data->file('picture'), "/school/$school_folder_name/teachers/picture");
        }

        return $this->teacher->create($teacherData);
    }
}
