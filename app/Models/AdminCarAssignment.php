<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCarAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['admin_user_id', 'car_id'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_user_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
