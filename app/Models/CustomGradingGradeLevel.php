<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomGradingGradeLevel extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = [
        'school_id',
        'custom_grading_id',
        'grade_level_id',
    ];

    protected $appends = ['grade_level'];

    public function getGradeLevelAttribute() {
        return GradeLevel::find($this->grade_level_id);
    }

}
