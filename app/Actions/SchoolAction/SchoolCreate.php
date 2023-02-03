<?php

namespace App\Actions\SchoolAction;

use App\Actions\CustomAction\Upload;
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

        $school_folder_name = str_replace(" ", "-", strtolower($schoolData['name']));

        // upload school picture
        if ($data->hasFile('logo') && $data->file('logo')) {
            
            $schoolData['logo'] = Upload::run($data->file('logo'), "/school/$school_folder_name/logo");
        }

        $schoolData['subdomain'] = str_replace(" ", "", strtolower($schoolData['name']));

        $school = $this->school->create($schoolData);

        return $school;
    }
}
