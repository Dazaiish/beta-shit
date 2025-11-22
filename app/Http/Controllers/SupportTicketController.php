<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    // Create a new support ticket
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'message' => 'required|string',
            'type' => 'nullable|string',
        ]);

        $ticket = SupportTicket::create($validated);
        return response()->json(['message' => 'Support ticket created', 'data' => $ticket]);
    }

    // List all tickets (for admins)
    public function index()
    {
        return response()->json(SupportTicket::all());
    }

    // Update a ticket (e.g. admin response)
    public function update(Request $request, $id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $ticket->update($request->all());

        return response()->json(['message' => 'Ticket updated', 'data' => $ticket]);
    }

    // Mark ticket as resolved
    public function resolve($id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $ticket->update(['status' => 'resolved']);

        return response()->json(['message' => 'Ticket resolved']);
    }
}
