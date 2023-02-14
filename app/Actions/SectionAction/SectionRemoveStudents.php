<?php

namespace App\Actions\SectionAction;

use App\Models\SectionStudent;
use Lorisleiva\Actions\Concerns\AsAction;

class SectionRemoveStudents
{
    use AsAction;

    protected $sectionStudent;

    public function __construct(SectionStudent $sectionStudent) {
        $this->sectionStudent = $sectionStudent;
    }

    public function handle($id)
    {
        $model = $this->sectionStudent->find($id);
        $model->delete();

        return $model;
    }
}
