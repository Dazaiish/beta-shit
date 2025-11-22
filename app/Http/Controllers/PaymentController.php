<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Create payment record
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required',
            'user_id' => 'required',
            'amount' => 'required|numeric',
            'method' => 'required|string',
        ]);

        $payment = Payment::create($validated);
        return response()->json(['message' => 'Payment successful', 'data' => $payment]);
    }

    // Show specific payment
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json($payment);
    }

    // Generate receipt (simulation)
    public function receipt($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json([
            'receipt' => "Receipt for Payment #{$payment->id}",
            'amount' => $payment->amount,
            'method' => $payment->method,
        ]);
    }
}
