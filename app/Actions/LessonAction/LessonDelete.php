<?php

namespace App\Actions\LessonAction;

use App\Models\Lesson;
use Lorisleiva\Actions\Concerns\AsAction;

class LessonDelete
{
    use AsAction;

    protected $lesson;

    public function __construct(Lesson $lesson) {
        $this->lesson = $lesson;
    }


    public function handle($id)
    {
        $model = $this->lesson->find($id);
        $model->delete();

        return $model;
    }
}
