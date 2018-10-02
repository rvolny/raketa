<?php

use App\ListInsuranceRange;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListInsuranceRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListInsuranceRange::create(['insurance_range' => '0_99']);
        ListInsuranceRange::create(['insurance_range' => '100_499']);
        ListInsuranceRange::create(['insurance_range' => '500_MAX']);
    }

}
