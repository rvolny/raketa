<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $production = "production";

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $env = env("APP_ENV", $this->production);

        $this->runCommonSeeders();

        if ($env != $this->production) {
            $this->runTestingSeeders();
        }
    }

    /**
     * Run seeds which are common for all environments
     *
     * @return void
     */
    public function runCommonSeeders()
    {
        $this->call(ListTransportationTypeSeeder::class);
        $this->call(ListDocumentTypeSeeder::class);
        $this->call(ListInsuranceRangeSeeder::class);
        $this->call(ListPackageTypeSeeder::class);
    }

    /**
     * Run seeds which are only suitable for testing environment
     *
     * @return void
     */
    public function runTestingSeeders()
    {

    }
}
