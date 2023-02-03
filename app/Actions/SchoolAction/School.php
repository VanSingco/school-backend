<?php

namespace App\Actions\SchoolAction;

use App\Models\School as ModelsSchool;
use Lorisleiva\Actions\Concerns\AsAction;

class School
{
    use AsAction;

    protected $school;

    public function __construct(ModelsSchool $school) {
        $this->school = $school;
    }

    public function handle($type, $data)
    {
        if ($type == 'subdomain') {
            return $this->school->where('subdomain', $data)->first();
        }

        return $this->school->find($data);
    }
}
