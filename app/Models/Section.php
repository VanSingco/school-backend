<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable = [
        'school_id',
        'teacher_id',
        'name',
        'grade_level_id'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function sectionStudents()
    {
        return $this->hasMany(SectionStudent::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class);
    }
}
