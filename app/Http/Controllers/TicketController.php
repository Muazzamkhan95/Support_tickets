<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create()
    {
        return view('ticket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'ticket_type' => 'required|string',
            'message' => 'required|string',
        ]);

        $trackingId = (string) \Str::uuid();

        // Save to main DB
        $ticket = Ticket::create([
            'tracking_id' => $trackingId,
            ...$validated,
        ]);

        // Determine DB connection
        $connection = match ($validated['ticket_type']) {
            'Technical Issues' => 'support_tech',
            'Account & Billing' => 'support_billing',
            'Product & Service' => 'support_product',
            'General Inquiry' => 'support_general',
            'Feedback & Suggestions' => 'support_feedback',
            default => null,
        };

        if ($connection) {
            try {
                Ticket::on($connection)->create([
                    'tracking_id' => $trackingId,
                    ...$validated,
                ]);
            } catch (\Exception $e) {
                // Log the error and continue
                \Log::error("Failed to save ticket to [$connection] DB: " . $e->getMessage());

                // Optional: show a warning in the UI
                return redirect()->route('ticket.create')
                    ->with('success', 'Ticket submitted successfully to main system, but failed to route to department.')
                    ->with('error', 'Departmental storage failed. Admin will review manually.');
            }
        }

        return redirect()->route('ticket.create')->with('success', 'Ticket submitted successfully.');
    }
}
