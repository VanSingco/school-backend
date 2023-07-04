<?php

namespace App\Actions\LessonDiscusstionAction;

use App\Actions\CustomAction\Upload;
use App\Models\Lesson;
use App\Models\LessonDiscussion;
use App\Models\LessonDiscussionFile;
use App\Models\School;
use Lorisleiva\Actions\Concerns\AsAction;

class LessonDiscussionCreate
{
    use AsAction;

    protected $lessonDiscussion, $lesson, $lessonDiscussionFile;

    public function __construct(LessonDiscussion $lessonDiscussion, Lesson $lesson, LessonDiscussionFile $lessonDiscussionFile) {
        $this->lessonDiscussion = $lessonDiscussion;
        $this->lesson = $lesson;
        $this->lessonDiscussionFile = $lessonDiscussionFile;
    }

    public function handle($data)
    {
        $findLesson = $this->lesson->find($data['lesson_id']);
        
        $data['school_id'] = $findLesson->school_id;
        $data['is_active'] = $data['is_active'] == 'true' ? true : false;
        $data['has_exam'] = $data['has_exam'] == 'true' ? true : false;
        
        $school = School::find($data['school_id']);

        $lessonDiscussion = $this->lessonDiscussion->create($data);
        // upload lesson discussion file if it exists
        if (isset($data['files']) && count($data['files']) > 0) {
            foreach ($data['files'] as $file) {
                $school_folder_name = str_replace(" ", "-", strtolower($school->name));
                $this->lessonDiscussionFile->create([
                    'school_id' => $data['school_id'],
                    'lesson_id' => $lessonDiscussion->lesson_id,
                    'lesson_discussion_id' => $lessonDiscussion->id,
                    'file_path' => Upload::run($file, "/school/$school_folder_name/lesson-discussion/files")
                ]);
            }
        }

        return $lessonDiscussion;
    }
}
