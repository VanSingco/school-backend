<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionStudent extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = [
        'school_id',
        'section_id',
        'student_id',
        'school_year_id'
    ];

    protected $appends = ['student'];

    public function getStudentAttribute() {
        return Student::find($this->student_id);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }
    
}
