<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class TicketController extends Controller
{

    public function index()
    {
        $ticketList = Ticket::all();

        return view('ticket.index', [
            'ticketList' => $ticketList,
            'currentTime' => strtotime(date('Y-m-d H:i:s'))
        ]);
    }

    public function create()
    {

    }

    public function store()
    {

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
