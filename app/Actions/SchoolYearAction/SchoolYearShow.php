<?php

namespace App\Actions\SchoolYearAction;

use App\Models\SchoolYear;
use Lorisleiva\Actions\Concerns\AsAction;

class SchoolYearShow
{
    use AsAction;

    protected $schoolYear;

    public function __construct(SchoolYear $schoolYear) {
        $this->schoolYear = $schoolYear;
    }

    public function handle($id)
    {
       return $this->schoolYear->find($id);
    }
}
