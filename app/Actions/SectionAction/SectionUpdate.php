<?php

namespace App\Actions\SectionAction;

use App\Models\Section;
use Lorisleiva\Actions\Concerns\AsAction;

class SectionUpdate
{
    use AsAction;

    protected $section;

    public function __construct(Section $section) {
        $this->section = $section;
    }

    public function handle($id, $data)
    {
        return $this->section->where('id', $id)->update($data->all());
    }
}
