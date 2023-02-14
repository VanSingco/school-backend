<?php

namespace App\Actions\CustomGradingStudentAction;

use App\Models\CustomGradingStudent;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingStudentUpdate
{
    use AsAction;

    protected $customGradingStudent;

    public function __construct(CustomGradingStudent $customGradingStudent) {
        $this->customGradingStudent = $customGradingStudent;
    }

    public function handle($id, $data)
    {
        return $this->customGradingStudent->where('id', $id)->update($data->all());
    }
}
