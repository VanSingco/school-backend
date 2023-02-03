<?php

namespace App\Actions\AssignSubjectAction;

use App\Models\AssignSubject;
use Lorisleiva\Actions\Concerns\AsAction;

class AssignSubjectUpdate
{
    use AsAction;

    protected $assignSubject;

    public function __construct(AssignSubject $assignSubject) {
        $this->assignSubject = $assignSubject;
    }

    public function handle($id, $data)
    {
        return $this->assignSubject->where('id', $id)->update($data->all());
    }
}
