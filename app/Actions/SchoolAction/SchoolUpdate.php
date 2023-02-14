<?php

namespace App\Actions\SchoolAction;

use App\Actions\CustomAction\Upload;
use App\Actions\GradeLevelAction\GenerateGradeLevel;
use App\Models\School;
use App\Services\UploadService;
use Lorisleiva\Actions\Concerns\AsAction;

class SchoolUpdate
{
    use AsAction;

    protected $school, $uploadService;
 
    public function __construct(School $school) {
        $this->school = $school;
    }

    public function handle($id, $data)
    {
        $schoolData = $data->all();
        // remove _method object from request
        unset($schoolData['_method']);

        $school_folder_name = str_replace("_", " ", strtolower($schoolData['name']));

         // upload school picture
        if ($data->hasFile('logo') && $data->file('logo')) {
            $schoolData['logo'] = Upload::run($data->file('logo'), "/school/$school_folder_name/logo");
        } else {
            unset($schoolData['logo']);
        }

        $schoolData['subdomain'] = str_replace(" ", "", strtolower($schoolData['name']));
        // Generate or update grade level belongs to school
        GenerateGradeLevel::run($schoolData['curricular_offering'], $id);

        return $this->school->where('id', $id)->update($schoolData);
    }
}
