<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Searchable;

    
    

    protected $fillable = [
        'email',
        'tracking_code',
        'status',
        'school_year_id',
        'notes'
    ];
}