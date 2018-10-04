<?php

use Illuminate\Database\Seeder;

class OauthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('oauth_clients')->insert([
            'id'                     => 1,
            'user_id'                => 2,
            'name'                   => 'swagger',
            'secret'                 => $faker->unique()->sha256(),
            'redirect'               => 'http://raketa.local/api/oauth2-callback',
            'personal_access_client' => 0,
            'password_client'        => 1,
            'revoked'                => 0,
            'created_at'             => now(),
            'updated_at'             => now(),
        ]);
    }
}