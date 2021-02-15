<?php

use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Models\Ticket::class, 10)
            ->create()
            ->each(function ($hotel) {
                $hotel->points()->saveMany(
                    factory(App\Models\TicketPoint::class, 100)->make());
            });
    }
}
