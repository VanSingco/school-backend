<?php

namespace App\Actions\SubjectAction;

use App\Models\Subject;
use Lorisleiva\Actions\Concerns\AsAction;

class SubjectUpdate
{
    use AsAction;

    protected $subject;

    public function __construct(Subject $subject) {
        $this->subject = $subject;
    }

    public function handle($id, $data)
    {
        return $this->subject->where('id', $id)->update($data->all());
    }
}
