<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable = [
        'school_id',
        'name',
        'type',
        'parent_subject_id',
        'ww',
        'qa',
        'pt',
        'ww_min_task',
        'ww_max_task',
        'qa_min_task',
        'qa_max_task',
        'pt_min_task',
        'pt_max_task',
    ];

    public function parentSubject()
    {
        return $this->belongsTo(Subject::class, 'parent_subject_id', 'id');
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    
}
