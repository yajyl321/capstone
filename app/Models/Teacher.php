<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Teacher extends Authenticatable
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'phone_number',
        'address',
        'personality',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
