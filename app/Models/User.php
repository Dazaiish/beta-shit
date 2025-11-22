<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'driver_license_number',
        'status',
    ];

    protected $hidden = ['password_hash'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class);
    }

    // Many-to-Many with Car (Admin manages Cars)
    public function managedCars()
    {
        return $this->belongsToMany(Car::class, 'admin_car_assignments', 'admin_user_id', 'car_id');
    }

    // Admin actions log
    public function adminActions()
    {
        return $this->hasMany(AdminUserAction::class, 'admin_user_id');
    }
}
