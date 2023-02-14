<?php

namespace App\Actions\SchoolAction;

use App\Actions\CustomAction\Upload;
use App\Actions\GradeLevelAction\GenerateGradeLevel;
use App\Models\School;
use App\Services\UploadService;
use Lorisleiva\Actions\Concerns\AsAction;

class SchoolCreate
{
    use AsAction;

    protected $school, $uploadService;

    public function __construct(School $school) {
        $this->school = $school;
    }

    public function handle($data)
    {
        $schoolData = $data->all();
        // get folder name base on school name
        $school_folder_name = str_replace(" ", "-", strtolower($schoolData['name']));

        // upload school picture
        if ($data->hasFile('logo') && $data->file('logo')) {
            
            $schoolData['logo'] = Upload::run($data->file('logo'), "/school/$school_folder_name/logo");
        }
        // get subdomain name base on school name
        $schoolData['subdomain'] = str_replace(" ", "", strtolower($schoolData['name']));
        // create school
        $school = $this->school->create($schoolData);
        // generate grade level base on school curricular offering
        GenerateGradeLevel::run($schoolData['curricular_offering'], $school->id);

        return $school;
    }
}
