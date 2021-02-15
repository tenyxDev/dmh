<?php

namespace App\Jobs;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;

    public $timeout = 20;

    protected $ticket;

    /**
     * Create a new job instance.
     *
     * @param $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->ticket->update([
            'ticket_name' => 'PROCESSED ' . $this->ticket->ticket_name,
            'description' => Carbon::now()->format('Y-m-d H:i:s') . ' ' . $this->ticket->description,
            'status'      => Ticket::STATUS_PENDING
        ]);
    }
}
