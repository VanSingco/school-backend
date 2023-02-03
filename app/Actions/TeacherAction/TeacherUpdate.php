<?php

namespace App\Actions\TeacherAction;

use App\Actions\CustomAction\Upload;
use App\Models\School;
use App\Models\Teacher;
use App\Models\User;
use App\Services\UploadService;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;
use phpDocumentor\Reflection\Types\This;

class TeacherUpdate
{
    use AsAction;

    protected $teacher, $user, $uploadService;

    public function __construct(Teacher $teacher, User $user) {
        $this->teacher = $teacher;
        $this->user = $user;
    }

    public function handle($id, $data)
    {
        $teacherData = $data->all();

        $teacher = $this->teacher->find($id);

        $this->user->where('id', $teacher->user_id)->update([
            'name' => $data->first_name,
            'email' => $data->email,
            'school_id' => $data->school_id,
        ]);

        $teacherData['is_active'] =  $data->is_active == 'true' ? true : false;
        unset($teacherData['_method']);
         // upload techer picture
         if ($data->hasFile('picture') && $data->file('picture')) {
            $school = School::find($data->school_id);
            $school_folder_name = str_replace(" ", "-", strtolower($school->name));
            $teacherData['picture'] = Upload::run($data->file('picture'), "/school/$school_folder_name/teachers/picture");
        } else {
            unset($teacherData['picture']);
        }

        return $this->teacher->where('id', $id)->update($teacherData);
    }
}
