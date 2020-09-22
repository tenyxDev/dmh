<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\TicketRequest;
use App\Jobs\SendReminderEmail;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{

    public function index()
    {
        $newTicketList = Ticket::where([
            'status' => Ticket::STATUSES['new']
        ])->orderBy('timer')->get();

        $activeTicketList = Ticket::where([
            'status' => Ticket::STATUSES['active']
        ])->where('timer', '>', Carbon::now()->format('U'))
            ->orderBy('timer')->get();

        $pendingTicketList = Ticket::where([
            'status' => Ticket::STATUSES['pending']
        ])->orderBy('timer')->get();

        $completedTicketList = Ticket::where([
            'status' => Ticket::STATUSES['completed']
        ])->orderBy('timer')->get();

        $failedTicketList = Ticket::where([
            'status' => Ticket::STATUSES['failed']
        ])->orWhere('timer', '<', Carbon::now()->format('U'))
            ->orderBy('timer')->get();

        return view('ticket.index', [
            'newTicketList'       => $newTicketList,
            'activeTicketList'    => $activeTicketList,
            'pendingTicketList'   => $pendingTicketList,
            'completedTicketList' => $completedTicketList,
            'failedTicketList'    => $failedTicketList,
            'currentTime'         => strtotime(date('Y-m-d H:i:s'))
        ]);
    }

    public function activate(Request $request)
    {
        Log::info('activate call', ['ticketId' => $request->get('taskId')]);
        $ticket = Ticket::whereId($request->get('ticketId'))->first(); // TODO: make Request validation
        $ticket->update([
            'status' => Ticket::STATUS_ACTIVE
        ]);

        // Create job
        dispatch((new SendReminderEmail($ticket))
            ->delay(Carbon::createFromFormat('U', $ticket->timer))
        );

        return redirect('/tickets');
    }

    public function deactivate(Request $request)
    {
        Log::info('deactivate call', ['ticketId' => $request->get('taskId')]);
        $ticket = Ticket::whereId($request->get('ticketId'))->first(); // TODO: make Request validation
        $ticket->update([
            'status' => Ticket::STATUS_NEW
        ]);
        // TODO: delete job from queue

        return redirect('/tickets');
    }

    public function destroy(Request $request)
    {
        Log::info('deactivate call', ['ticketId' => $request->get('taskId')]);
        $ticket = Ticket::whereId($request->get('ticketId'))->first(); // TODO: make Request validation

        $hasTicketPoint = true; // TODO: get real point count
        if (!$hasTicketPoint) {
            // cascade delete control thought user popup like
            // ticket contains job points! are you sure to delete
            return redirect('/tickets');
        }

        $ticket->destroy($ticket->id);

        return redirect('/tickets');
    }

    public function create()
    {
        return view('ticket.create');
    }

    public function info()
    {

//        dump(Config::all());
        $dir = 'C:\projects\dmh\src\storage\logs';
        if (is_dir($dir)) {
            dd(phpinfo());
        }
    }

    /**
     * @param TicketRequest $request
     * @return RedirectResponse
     */
    public function store(TicketRequest $request)
    {
        Log::info('store call');
        $ticketData = $request->except(['_method', '_token']);

        $ticketData['status'] = Ticket::STATUS_NEW;
        $ticketData['user_id'] = User::DEFAULT_USER;
        $ticketData['changed_by'] = User::DEFAULT_USER;


        $ticketData['timer'] = implode(' ', $request->get('timer'));
        try {
            $carbonTimer = Carbon::createFromFormat('Y-m-d H:i:s', implode(' ', $request->get('timer')));
        } catch (\Exception $e) {
            Log::info('store ticket with Y-m-d H:i format of timer', ['timer' => $request->get('timer')]);
            $carbonTimer = Carbon::createFromFormat('Y-m-d H:i', implode(' ', $request->get('timer')));
        }
        $ticketData['timer'] = $carbonTimer->format('U');
        $ticket = Ticket::create($ticketData);

        SendReminderEmail::dispatch($ticket)->delay($carbonTimer);

        return redirect('/tickets');
    }

    public function edit($ticketId)
    {
        $ticket = Ticket::whereId($ticketId)->first(); // TODO: make Request validation

        return view('ticket.edit', [
            'ticket' => $ticket
        ]);
    }

    public function show($ticketId)
    {
        dd('show ticket points' . $ticketId);
        return $this->edit($ticketId); // TODO: show ticket points
    }

    public function update(TicketRequest $request, $ticketId)
    {
        $ticketData = $request->except(['_method', '_token']);
        $timer = $request->get('timer');
        $ticketData['timer'] = Carbon::createFromFormat('Y-m-d H:i:s', $timer['date'] . ' ' . $timer['time'])
            ->format('U');

        $ticket = Ticket::findOrFail($ticketId);
        $ticket->update($ticketData);

        return redirect('/tickets');
    }
}
