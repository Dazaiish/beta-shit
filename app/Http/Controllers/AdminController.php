<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use App\Models\AdminUsersActions;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Manage users (view all, verify, or ban)
    public function manageUsers()
    {
        return response()->json(User::all());
    }

    // Manage cars (view all, update status)
    public function manageCars()
    {
        return response()->json(Car::all());
    }

    // View system logs or admin actions
    public function logActions()
    {
        return response()->json(AdminUsersActions::all());
    }
}
