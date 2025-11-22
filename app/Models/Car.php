<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'license_plate',
        'brand',
        'model',
        'range_km',
        'seating_capacity',
        'price_per_day',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function admins()
    {
        return $this->belongsToMany(User::class, 'admin_car_assignments', 'car_id', 'admin_user_id');
    }
}
