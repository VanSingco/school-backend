<?php

namespace App\Actions\SubjectAction;

use App\Models\Subject;
use Lorisleiva\Actions\Concerns\AsAction;

class SubjectCreate
{
    use AsAction;

    protected $subject;

    public function __construct(Subject $subject) {
        $this->subject = $subject;
    }

    public function handle($data)
    {
        return $this->subject->create($data->all());
    }
}
