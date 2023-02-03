<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable = [
        'school_id',
        'user_id',
        'primary_contact_person',
        'primary_contact_number',
        'primary_contact_email',
        'father_first_name',
        'father_last_name',
        'father_middle_name',
        'father_suffix_name',
        'father_contact_no',
        'father_birth_date',
        'father_occupation',
        'father_highest_education_attaiment',
        'mother_first_name',
        'mother_last_name',
        'mother_middle_name',
        'mother_suffix_name',
        'mother_contact_no',
        'mother_birth_date',
        'mother_occupation',
        'mother_highest_education_attaiment',
        'guardian_first_name',
        'guardian_last_name',
        'guardian_middle_name',
        'guardian_suffix_name',
        'guardian_contact_no',
        'guardian_birth_date',
        'guardian_occupation',
        'guardian_highest_education_attaiment',
        'is_active',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
