<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExecuteTicket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticketName;

    /**
     * Create a new job instance.
     *
     * @param $ticketName
     */
    public function __construct($ticketName)
    {
        $this->ticketName = $ticketName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        info('ExecuteTicket ' . $this->ticketName);
    }
}
