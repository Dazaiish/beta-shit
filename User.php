<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password_hash',
        'role',
        'driver_license_number',
        'status',
    ];

    protected $casts = [
        'phone_verified_at' => 'datetime',
    ];

    protected $hidden = ['password_hash'];

    /**
     * Return the password for authentication (column is password_hash)
     */
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    /**
     * Provide an `id` attribute alias for compatibility
     */
    public function getIdAttribute()
    {
        return $this->{$this->primaryKey};
    }

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

