<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\This;

class AssignSubjectSchedule extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable = [
        'school_id',
        'section_id',
        'assign_subject_id',
        'teacher_id',
        'classroom_name',
    ];


    public function dayTimeSchedules() {
        return $this->hasMany(AssignSubjectScheduleDayTime::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function assignSubject()
    {
        return $this->belongsTo(AssignSubject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
