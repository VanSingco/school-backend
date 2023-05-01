<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonDiscussion extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable  =  [
        'school_id',
        'lesson_id',
        'title',
        'description',
        'quarter',
        'start_date',
        'end_date',
        'is_active',
        'has_exam',
        'exam_attempt',
        'exam_time'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}