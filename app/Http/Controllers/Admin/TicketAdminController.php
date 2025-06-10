<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketAdminController extends Controller
{
    public function index()
    {
        $tickets = Ticket::orderByDesc('created_at')->get();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    public function note(Request $request, Ticket $ticket)
    {


        // $request->validate(['note' => ' string']);

        $note =  $request->input('note') == null ? 'No Note by admin':$request->input('note');

        // Example logic: just mark ticket as "Noted"
        $ticket->update([
            'status' => 'Noted',
            'note' => $note,
        ]);


        return redirect()->route('admin.tickets.show', $ticket)->with('success', 'Ticket noted.');
    }
}
