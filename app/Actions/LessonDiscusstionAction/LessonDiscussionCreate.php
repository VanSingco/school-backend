<?php

namespace App\Actions\LessonDiscusstionAction;

use App\Models\LessonDiscussion;
use Lorisleiva\Actions\Concerns\AsAction;

class LessonDiscussionCreate
{
    use AsAction;

    protected $lessonDiscussion;

    public function __construct(LessonDiscussion $lessonDiscussion) {
        $this->lessonDiscussion = $lessonDiscussion;
    }

    public function handle($data)
    {
        return $this->lessonDiscussion->create($data);
    }
}
