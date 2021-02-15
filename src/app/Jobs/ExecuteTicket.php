<?php

namespace App\Jobs;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExecuteTicket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticketId;

    /**
     * Create a new job instance.
     *
     * @param $ticketId
     */
    public function __construct($ticketId)
    {
        $this->ticketId = (int)$ticketId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        info('ExecuteTicket start with ticketId: ' . $this->ticketId);

        $ticket = Ticket::whereId($this->ticketId)->first();
        $ticket->update([
            'status' => Ticket::STATUS_PENDING
        ]);

        if ($this->processTicketPoints()) {
            $ticket->update([
                'status' => Ticket::STATUS_COMPLETED
            ]);
            info('ExecuteTicket result: ' . var_export([
                    'ticketId' => $this->ticketId,
                    'status'   => Ticket::STATUS_COMPLETED
                ], true));
        } else {
            $ticket->update([
                'status' => Ticket::STATUS_FAILED
            ]);

            info('ExecuteTicket result: ' . var_export([
                    'ticketId' => $this->ticketId,
                    'status'   => Ticket::STATUS_FAILED
                ], true));
        }
    }

    /**
     * @return bool
     */
    protected function processTicketPoints(): bool
    {
        info('processTicketPoints false');

        return false;
    }
}
