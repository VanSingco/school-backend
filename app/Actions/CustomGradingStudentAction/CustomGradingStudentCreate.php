<?php

namespace App\Actions\CustomGradingStudentAction;

use App\Models\CustomGradingStudent;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingStudentCreate
{
    use AsAction;

    protected $customGradingStudent;

    public function __construct(CustomGradingStudent $customGradingStudent) {
        $this->customGradingStudent = $customGradingStudent;
    }

    public function handle($data)
    {
        return $this->customGradingStudent->create($data->all());
    }
}
