<?php

namespace App\Actions\LessonDiscusstionAction;

use App\Models\LessonDiscussion;
use Lorisleiva\Actions\Concerns\AsAction;

class LessonDiscussionShow
{
    use AsAction;

    protected $lessonDiscussion;

    public function __construct(LessonDiscussion $lessonDiscussion) {
        $this->lessonDiscussion = $lessonDiscussion;
    }


    public function handle($id)
    {
       return $this->lessonDiscussion->where('id', $id)->with(['school'])->first();
    }
}
