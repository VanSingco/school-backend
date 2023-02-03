<?php

namespace App\Actions\SectionAction;

use App\Models\Section;
use Lorisleiva\Actions\Concerns\AsAction;

class SectionCreate
{
    use AsAction;

    protected $section;

    public function __construct(Section $section) {
        $this->section = $section;
    }

    public function handle($data)
    {
        return $this->section->create($data->all());
    }
}
