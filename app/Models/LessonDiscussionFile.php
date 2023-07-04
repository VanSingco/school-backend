<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonDiscussionFile extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable = [
        'school_id',
        'lesson_id',
        'lesson_discussion_id',
        'file_path',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function lesson() 
    {
        return $this->belongsTo(Lesson::class);
    }

    public function lessonDiscussion() {
        return $this->belongsTo(LessonDiscussion::class);
    }
}