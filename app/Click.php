<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [
        'count',
        'date'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function scopeToday(Builder $query)
    {
        return $query->where('date', Carbon::today());
    }
}
