<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubjectScheduleDayTime extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = [
        'school_id',
        'assign_subject_schedule_id',
        'day',
        'time_from',
        'time_to',
    ];

    protected $appends = ['format_time_from', 'format_time_to'];

    public function getFormatTimeFromAttribute()
    {
        return Carbon::parse(Carbon::now()->format('Y-m-d ').$this->time_from)->isoFormat('h:mm a');
    }

    public function getFormatTimeToAttribute()
    {
        return Carbon::parse(Carbon::now()->format('Y-m-d ').$this->time_to)->isoFormat('h:mm a');
    }
}
