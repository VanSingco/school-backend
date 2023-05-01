<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonDiscussionResponse extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable = [
        'school_id',
        'lesson_id',
        'lesson_discussion_id',
        'lesson_discussion_attempt_id',
        'lesson_discussion_question_id',
        'student_id',
        'answer',
        'score',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
