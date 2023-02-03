<?php

namespace App\Actions\AssignSubjectAction;

use App\Models\AssignSubject;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignSubjectCreate
{
    use AsAction;

    protected $assignSubject;

    public function __construct(AssignSubject $assignSubject) {
        $this->assignSubject = $assignSubject;
    }

    public function handle($data)
    {
        return $this->assignSubject->create($data->all());
    }
}
