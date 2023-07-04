<?php

namespace App\Actions\LessonDiscusstionAction;

use App\Models\LessonDiscussion;
use Lorisleiva\Actions\Concerns\AsAction;

class LessonDiscussionList
{
    use AsAction;

    protected $lessonDiscussion;

    public function __construct(LessonDiscussion $lessonDiscussion) {
        $this->lessonDiscussion = $lessonDiscussion;
    }


    public function handle($data)
    {
        return $this->lessonDiscussionList($data->lesson_id);
    }

    public function lessonDiscussionList($lesson_id) 
    {
        
        return $this->lessonDiscussion
                    ->where('lesson_id', $lesson_id)
                    ->orderBy('order', 'asc')
                    ->get()
                    ->groupBy('quarter');

    }
}
