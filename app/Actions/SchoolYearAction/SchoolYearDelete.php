<?php

namespace App\Actions\SchoolYearAction;

use App\Models\SchoolYear;
use Lorisleiva\Actions\Concerns\AsAction;

class SchoolYearDelete
{
    use AsAction;

    protected $schoolYear;

    public function __construct(SchoolYear $schoolYear) {
        $this->schoolYear = $schoolYear;
    }

    public function handle($id)
    {
        $model = $this->schoolYear->find($id);
        $model->delete();

        return $model;
    }
}
