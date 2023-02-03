<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable = [
        'school_id',
        'user_id',
        'lrn',
        'number',
        'first_name',
        'last_name',
        'middle_name',
        'suffix_name',
        'id_picture',
        'gender',
        'birth_date',
        'birth_place',
        'citizenship',
        'mother_tongue',
        'religion',
        'street_address',
        'barangay',
        'city',
        'region',
        'province',
        'country',  
        'zipcode',
        'status',
        'type',
        'payment_options',
        'grade_level_id',
        'last_grade_level_id',
        'schoo_year_id',
        'last_schoo_year_id',
        'primary_contact_person',
        'primary_contact_no',
        'primary_contact_relationship',
    ];

    public function gradeLevel()
    {
       return $this->belongsTo(GradeLevel::class);
    }

    public function schoolYear()
    {
       return $this->belongsTo(SchoolYear::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    
}
