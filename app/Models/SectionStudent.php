<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionStudent extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable = [
        'section_id',
        'student_id',
        'school_year_id'
    ];
    
}
