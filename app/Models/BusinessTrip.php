<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BusinessTrip extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getDaysAttribute()
    {
        $start_date = Carbon::createFromFormat('Y-m-d', $this->departure_date);
        $end_date = Carbon::createFromFormat('Y-m-d', $this->return_date);
        $different_days = $start_date->diffInDays($end_date);
        return $different_days;
    }

    protected $appends = ['days'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city1()
    {
        return $this->belongsTo(City::class, 'city_id_1');
    }

    public function city2()
    {
        return $this->belongsTo(City::class, 'city_id_2');
    }
}
