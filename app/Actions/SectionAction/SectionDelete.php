<?php

namespace App\Actions\SectionAction;

use App\Models\Section;
use Lorisleiva\Actions\Concerns\AsAction;

class SectionDelete
{
    use AsAction;

    protected $section;

    public function __construct(Section $section) {
        $this->section = $section;
    }

    public function handle($id)
    {
        $model = $this->section->find($id);
        $model->delete();

        return $model;
    }
}
