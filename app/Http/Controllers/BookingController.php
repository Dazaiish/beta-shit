<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Create a new booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'car_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $booking = Booking::create($validated);
        return response()->json(['message' => 'Booking created successfully', 'data' => $booking]);
    }

    // Update booking (extend or modify)
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return response()->json(['message' => 'Booking updated successfully', 'data' => $booking]);
    }

    // Cancel booking
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json(['message' => 'Booking cancelled successfully']);
    }
}
