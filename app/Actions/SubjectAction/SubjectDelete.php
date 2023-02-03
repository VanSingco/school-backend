<?php

namespace App\Actions\SubjectAction;

use App\Models\Subject;
use Lorisleiva\Actions\Concerns\AsAction;

class SubjectDelete
{
    use AsAction;

    protected $subject;

    public function __construct(Subject $subject) {
        $this->subject = $subject;
    }

    public function handle($id)
    {
        $model = $this->subject->find($id);
        $model->delete();

        return $model;
    }
}
