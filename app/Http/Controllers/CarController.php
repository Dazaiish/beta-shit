<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // List all cars
    public function index()
    {
        return response()->json(Car::all());
    }

    // Show details of a specific car
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return response()->json($car);
    }

    // Filter cars by availability, price, or type
    public function filter(Request $request)
    {
        $query = Car::query();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        if ($request->has('price')) {
            $query->where('price', '<=', $request->price);
        }
        if ($request->has('brand')) {
            $query->where('brand', 'LIKE', '%' . $request->brand . '%');
        }

        return response()->json($query->get());
    }
}
