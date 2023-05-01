<?php

namespace App\Actions\LessonAction;

use App\Models\Lesson;
use Lorisleiva\Actions\Concerns\AsAction;

class LessonUpdate
{
    use AsAction;

    protected $lesson;

    public function __construct(Lesson $lesson) {
        $this->lesson = $lesson;
    }

    public function handle($id, $data)
    {
        return $this->lesson->where('id', $id)->update($data);
    }
}
