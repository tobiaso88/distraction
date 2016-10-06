<?php

namespace App;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [
        'user_id',
        'date'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeToday(Builder $query)
    {
        return $query->where('date', Carbon::today());
    }

    public function scopeUser(Builder $query)
    {
        return $query->where('user_id', Auth::id());
    }
}
