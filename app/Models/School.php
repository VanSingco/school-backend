<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    protected $table = "schools";

    protected $fillable = [
        'id_number',
        'name',
        'email',
        'school_head',
        'contact_no',
        'logo',
        'subdomain',
        'curricular_offering',
        'classification',
        'district',
        'division',
        'region',
        'province',
        'city',
        'country',
        'address',
        'accredited_to_deped',
        'description',
        'mission',
        'vision',
        'status',
    ];
}
