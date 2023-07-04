<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonDiscussionQuestion extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable = [
        'school_id',
        'lesson_id',
        'lesson_discussion_id',
        'question',
        'question_type',
        'choices',
        'correct_answer',
        'points',
        'order',
        'teacher_check'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}