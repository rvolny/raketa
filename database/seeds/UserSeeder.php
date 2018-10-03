<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'                => 1,
            'name'              => 'Admin',
            'surname'           => 'Admin',
            'email'             => 'admin@noreply.com',
            'email_verified_at' => Carbon::now(),
            'password'          => bcrypt('123456'),
        ]);
        User::create([
            'id'                => 2,
            'name'              => 'Swagger',
            'surname'           => 'Swagger',
            'email'             => 'swagger@noreply.com',
            'email_verified_at' => Carbon::now(),
            'password'          => bcrypt('123456'),
        ]);
        User::create([
            'id'                => 3,
            'name'              => 'Jurij',
            'surname'           => 'Gagarin',
            'email'             => 'gagarin@noreply.com',
            'email_verified_at' => Carbon::now(),
            'password'          => bcrypt('123456'),
        ]);
        User::create([
            'id'                => 4,
            'name'              => 'Sender',
            'surname'           => 'Sender',
            'email'             => 'sender@noreply.com',
            'email_verified_at' => Carbon::now(),
            'password'          => bcrypt('123456'),
        ]);
        User::create([
            'id'                => 5,
            'name'              => 'Courier',
            'surname'           => 'Courier',
            'email'             => 'courier@noreply.com',
            'email_verified_at' => Carbon::now(),
            'password'          => bcrypt('123456'),
        ]);
    }

}
