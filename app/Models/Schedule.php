<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id', 'time_slot', 'day_of_week', 'is_booked'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
