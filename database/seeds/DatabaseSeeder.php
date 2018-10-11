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

        // Seeders are only run on non production environments
        if ($env != $this->production) {
            $this->call(UserSeeder::class);
            $this->call(OauthClientSeeder::class);
            $this->call(ConversationsSeeder::class);
        }
    }
}
