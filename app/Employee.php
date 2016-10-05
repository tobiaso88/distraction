<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function clicks()
    {
        return $this->hasMany(Click::class);
    }

    public function getClicksTodayAttribute()
    {
        $click = $this->clicks()->today()->first();
        return $click ? $click->count : 0;
    }

    public function getClicksTotalAttribute()
    {
        return $this->clicks()->sum('count');
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        $attributes = parent::toArray();
        $attributes['clicks_today'] = $this->clicks_today;
        $attributes['clicks_total'] = $this->clicks_total;
        return $attributes;
    }
}
