<?php

namespace App\Actions\LessonAction;

use App\Models\Lesson;
use Lorisleiva\Actions\Concerns\AsAction;

class LessonCreate
{
    use AsAction;

    protected $lesson;

    public function __construct(Lesson $lesson) {
        $this->lesson = $lesson;
    }

    public function handle($data)
    {
        return $this->lesson->create($data);
    }
}
