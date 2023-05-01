<?php

namespace App\Actions\LessonAction;

use App\Models\Lesson;
use Lorisleiva\Actions\Concerns\AsAction;

class LessonList
{
    use AsAction;

    protected $lesson;

    public function __construct(Lesson $lesson) {
        $this->lesson = $lesson;
    }


    public function handle($data)
    {
        return $this->lessonList($data->search, $data->orderBy, $data->paginate, $data->school_id);
    }

    public function lessonList($search='', $orderBy='DESC', $paginate='true', $school_id=null, $perPage=10) 
    {
        
        $model = $this->lesson->orderBy('created_at', $orderBy);

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
