<?php

namespace App\Actions\StudentAction;

use App\Actions\CustomAction\Upload;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class StudentCreate
{
    use AsAction;

    protected $student, $user;

    public function __construct(Student $student, User $user) {
        $this->student = $student;
        $this->user = $user;
    }

    public function handle($data)
    {
        $studentData = $data->all();

        // create a user teacher
        $user = $this->user->create([
            'name' => $data->first_name,
            'email' => str_replace(' ', '', strtolower($data->first_name)).'@gmail.com',
            'password' => Hash::make(str_replace(' ', '', strtolower($data->last_name))),
            'school_id' => $data->school_id,
            'user_type' => 'student',
        ]);
        // generate student number
        $studentNumber = Carbon::now()->format('Y').str_pad(($this->student->where('school_id', $data->school_id)->count() + 1), 6, '0', STR_PAD_LEFT);
        // store user id to teacher table
        $studentData['user_id'] = $user->id;
        $studentData['number'] = $studentNumber;
        // upload student id picture
        if ($data->hasFile('id_picture') && $data->file('id_picture')) {
            $school = School::find($data->school_id);
            $school_folder_name = str_replace(" ", "-", strtolower($school->name));

            $studentData['id_picture'] = Upload::run($data->file('id_picture'), "/school/$school_folder_name/students/id_picture");
        }

        return $this->student->create($studentData);
    }
}
