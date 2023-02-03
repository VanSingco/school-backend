<?php

namespace App\Actions\StudentAction;

use App\Actions\CustomAction\Upload;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class StudentUpdate
{
    use AsAction;

    protected $student, $user;

    public function __construct(Student $student, User $user) {
        $this->student = $student;
        $this->user = $user;
    }

    public function handle($id, $data)
    {
        $studentData = $data->all();

        $student = $this->student->find($id);
        // Update student user
        $this->user->where('id', $student->user_id)->update([
            'name' => $data->first_name,
            'school_id' => $data->school_id,
        ]);

        unset($studentData['_method']);

        // upload student id picture
        if ($data->hasFile('id_picture') && $data->file('id_picture')) {
            $school = School::find($data->school_id);
            $school_folder_name = str_replace(" ", "-", strtolower($school->name));

            $studentData['id_picture'] = Upload::run($data->file('id_picture'), "/school/$school_folder_name/students/id_picture");
        }else {
            unset($studentData['id_picture']);
        }

        return $this->student->where('id', $id)->update($studentData);
    }
}
