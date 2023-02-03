<?php

namespace App\Actions\SchoolYearAction;

use App\Models\SchoolYear;
use Lorisleiva\Actions\Concerns\AsAction;

class SchoolYearCreate
{
    use AsAction;

    protected $schoolYear;

    public function __construct(SchoolYear $schoolYear) {
        $this->schoolYear = $schoolYear;
    }

    public function handle($data)
    {
        $schoolYear  = $data->all();
        $schoolYear['school_year'] = $schoolYear['from'].'-'.$schoolYear['to'];
        return $this->schoolYear->create($schoolYear);
    }
}
