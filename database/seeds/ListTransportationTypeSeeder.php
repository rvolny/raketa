<?php

use App\ListTransportationType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListTransportationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListTransportationType::create(['transportation_type' => 'CAR']);
        ListTransportationType::create(['transportation_type' => 'BUS']);
        ListTransportationType::create(['transportation_type' => 'TRAIN']);
        ListTransportationType::create(['transportation_type' => 'AIRPLANE']);
        ListTransportationType::create(['transportation_type' => 'BICYCLE']);
        ListTransportationType::create(['transportation_type' => 'FOOT']);
    }

}
