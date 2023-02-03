<?php

namespace App\Actions\AssignSubjectAction;

use App\Models\AssignSubject;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignSubjectDelete
{
    use AsAction;

    protected $assignSubject;

    public function __construct(AssignSubject $assignSubject) {
        $this->assignSubject = $assignSubject;
    }

    public function handle($id)
    {
        $model = $this->assignSubject->find($id);
        $model->delete();

        return $model;
    }
}
