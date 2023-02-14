<?php

namespace App\Actions\AssignSubjectAction;

use App\Models\AssignSubject;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignSubjectShow
{
    use AsAction;

    protected $assignSubject;

    public function __construct(AssignSubject $assignSubject) {
        $this->assignSubject = $assignSubject;
    }

    public function handle($id)
    {
        return $this->assignSubject->where('id', $id)->with(['subject', 'gradeLevel'])->first();
    }
}
