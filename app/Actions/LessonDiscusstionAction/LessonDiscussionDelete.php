<?php

namespace App\Actions\LessonDiscusstionAction;

use App\Models\LessonDiscussion;
use Lorisleiva\Actions\Concerns\AsAction;

class LessonDiscussionDelete
{
    use AsAction;

    protected $lessonDiscusstion;

    public function __construct(LessonDiscussion $lessonDiscusstion) {
        $this->lessonDiscusstion = $lessonDiscusstion;
    }


    public function handle($id)
    {
        $model = $this->lessonDiscusstion->find($id);
        $model->delete();

        return $model;
    }
}
