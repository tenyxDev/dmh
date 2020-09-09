<?php

/** @var Factory $factory */

use App\Models\Ticket;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'ticket_type' => rand(0, 6),
        'ticket_name' => $faker->name,
        'timer' => 1605830400,
        'changed_by' => 1,
        'user_id' => 1,
    ];
});
