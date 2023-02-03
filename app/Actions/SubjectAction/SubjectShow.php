<?php

namespace App\Actions\SubjectAction;

use App\Models\Subject;
use Lorisleiva\Actions\Concerns\AsAction;

class SubjectShow
{
    use AsAction;

    protected $subject;

    public function __construct(Subject $subject) {
        $this->subject = $subject;
    }

    public function handle($id)
    {
       return $this->subject->find($id);
    }
}
