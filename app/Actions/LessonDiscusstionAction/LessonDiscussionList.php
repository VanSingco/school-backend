<?php

namespace App\Actions\LessonDiscussionDiscusstionAction;

use App\Models\LessonDiscussion;
use Lorisleiva\Actions\Concerns\AsAction;

class LessonDiscussionDiscussionList
{
    use AsAction;

    protected $lessonDiscussion;

    public function __construct(LessonDiscussion $lessonDiscussion) {
        $this->lessonDiscussion = $lessonDiscussion;
    }


    public function handle($data)
    {
        return $this->lessonDiscussionList($data->search, $data->orderBy, $data->paginate, $data->school_id);
    }

    public function lessonDiscussionList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $perPage=10) 
    {
        
        $model = $this->lessonDiscussion->orderBy('created_at', $orderBy);

        if ($school_id != 'null') {
            $model->where('school_id', $school_id);
        }

        if ($search) {
            $model->search($search);
        }

        if ($paginate == 'true') {
            return $model->with(['school'])->paginate($perPage);
        } else {
            return $model->get();
        }
    }
}
