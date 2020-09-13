<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{

    public function index()
    {
        $newTicketList = Ticket::where([
            'status' => Ticket::STATUSES['new']
        ])->get();
        $activeTicketList = Ticket::where([
            'status' => Ticket::STATUSES['active']
        ])->get();
        $pendingTicketList = Ticket::where([
            'status' => Ticket::STATUSES['pending']
        ])->get();
        $completedTicketList = Ticket::where([
            'status' => Ticket::STATUSES['completed']
        ])->get();
        $failedTicketList = Ticket::where([
            'status' => Ticket::STATUSES['failed']
        ])->get();

        return view('ticket.index', [
            'newTicketList'       => $newTicketList,
            'activeTicketList'    => $activeTicketList,
            'pendingTicketList'   => $pendingTicketList,
            'completedTicketList' => $completedTicketList,
            'failedTicketList'    => $failedTicketList,
            'currentTime'         => strtotime(date('Y-m-d H:i:s'))
        ]);
    }

    public function complete(Request $request)
    {
        Log::info('complete call', ['taskId' => $request->get('taskId')]);
        $ticket = Ticket::whereId($request->get('taskId'))->first(); // TODO: make Request validation
        $ticket->update([
            'status' => Ticket::STATUS_COMPLETED
        ]);
    }

    public function create()
    {

    }

    public function store()
    {
//        $ticket = new Ticket;
//        $ticket->status = Ticket::STATUS_COMPLETED;
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
