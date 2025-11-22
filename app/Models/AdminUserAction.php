<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUserAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_user_id',
        'target_user_id',
        'target_car_id',
        'action_type',
        'notes',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_user_id');
    }

    public function targetUser()
    {
        return $this->belongsTo(User::class, 'target_user_id');
    }

    public function targetCar()
    {
        return $this->belongsTo(Car::class, 'target_car_id');
    }
}

