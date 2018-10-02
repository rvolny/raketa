<?php

use App\ListPackageType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListPackageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListPackageType::create(['package_type' => 'ENVELOPE_A4']);
        ListPackageType::create(['package_type' => 'ENVELOPE_A5']);
        ListPackageType::create(['package_type' => 'PACKAGE_SMALL']);
        ListPackageType::create(['package_type' => 'PACKAGE_MEDIUM']);
        ListPackageType::create(['package_type' => 'PACKAGE_LARGE']);
    }

}
