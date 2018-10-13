<?php

use App\Courier;
use App\ListInsuranceRange;
use App\ListPackageType;
use App\Sender;
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

$factory->define(App\Package::class,
    function (Faker $faker) {
        $pickup_date = $faker->dateTimeBetween(
            $startDate = 'now', $endDate = 'now +1 month');

        $senderCount = Sender::count();
        $courierCount = Courier::count();
        $listPackageTypeCount = ListPackageType::count();
        $listInsuranceRangeTypeCount = ListInsuranceRange::count();

        return [
            'sender_id'               => $faker->numberBetween($min = 1,
                $max = $senderCount),
            'courier_id'              => $faker->optional()->numberBetween(
                $min = 1, $max = $courierCount),
            'contents'                => $faker->sentence($nbWords = 3,
                $variableNbWords = true),
            'list_package_type_id'    => $faker->numberBetween($min = 1,
                $max = $listPackageTypeCount),
            'pickup_location'         => $faker->city,
            'pickup_date'             => $pickup_date,
            'pickup_time'             => $faker->optional()->time(),
            'pickup_note'             => $faker->optional()->sentence(
                $variableNbWords = 6),
            'delivery_location'       => $faker->city,
            'delivery_date'           => $faker->dateTimeBetween(
                $startDate = $pickup_date,
                $endDate = date('Y-m-d', $pickup_date->getTimestamp())
                    .' +1 month'),
            'delivery_time'           => $faker->optional()->time(),
            'delivery_note'           => $faker->text($maxNbChars = 200),
            'price'                   => $faker->numberBetween($min = 1,
                $max = 100),
            'price_max_increase'      => $faker->optional()->numberBetween(
                $min = 0, $max = 20),
            'list_insurance_range_id' => $faker->numberBetween($min = 1,
                $max = $listInsuranceRangeTypeCount),
            'alternative_contact'     => $faker->phoneNumber,
            'password'                => $faker->word,
        ];
    });
