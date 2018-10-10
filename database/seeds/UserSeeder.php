<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'id'                => 1,
            'name'              => 'Admin',
            'surname'           => 'Admin',
            'email'             => 'admin@noreply.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
        ]);
        $user->assignRole(['admin']);

        $user = User::create([
            'id'                => 2,
            'name'              => 'Swagger',
            'surname'           => 'Swagger',
            'email'             => 'swagger@noreply.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
        ]);
        $user->assignRole(['admin', 'user', 'sender', 'courier']);

        $user = User::create([
            'id'                => 3,
            'name'              => 'Jurij',
            'surname'           => 'Gagarin',
            'email'             => 'gagarin@noreply.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
        ]);
        $user->assignRole(['admin', 'user', 'sender', 'courier']);

        $user = User::create([
            'id'                => 4,
            'name'              => 'Sender',
            'surname'           => 'Sender',
            'email'             => 'sender@noreply.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
        ]);
        $user->assignRole('user');

        $user = User::create([
            'id'                => 5,
            'name'              => 'Courier',
            'surname'           => 'Courier',
            'email'             => 'courier@noreply.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
        ]);
        $user->assignRole('user');

    }

}
