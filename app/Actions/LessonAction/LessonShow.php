<?php

namespace App\Actions\LessonAction;

use App\Models\Lesson;
use Lorisleiva\Actions\Concerns\AsAction;

class LessonShow
{
    use AsAction;

    protected $lesson;

    public function __construct(Lesson $lesson) {
        $this->lesson = $lesson;
    }


    public function handle($id)
    {
       return $this->lesson->where('id', $id)->with(['school'])->first();
    }
}
