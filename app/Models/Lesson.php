<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable  =  [
        'school_id',
        'assign_subject_schedule_id',
        'description',
    ];

    protected $appends = ['assign_subject_schedule'];

    public function getAssignSubjectScheduleAttribute() {
        return AssignSubjectSchedule::where('id', $this->assign_subject_schedule_id)
                            ->with(['section', 'teacher'])
                            ->first();
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
