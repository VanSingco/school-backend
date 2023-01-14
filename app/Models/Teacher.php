<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'suffix_name',
        'contact_no',
        'picture',
        'gender',
        'birth_date',
        'birth_place',
        'citizenship',
        'street_address',
        'barangay',
        'city',
        'region',
        'province',
        'country',  
        'zipcode',
        'highest_education_attaiment',
        'is_active'
    ];
}
