<?php

use Faker\Generator as Faker;

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

$factory->define(App\Message::class,
    function (Faker $faker) {
        return [
            'user_id_from' => null,
            'message'      => $faker->realText($maxNbChars = 200,
                $indexSize = 2),
            'received_at'  => $faker->dateTime($max = 'now', $timezone = null),
            'read_at'      => $faker->dateTime($max = 'now', $timezone = null),
            'ip'           => $faker->ipv4(),
        ];
    });
