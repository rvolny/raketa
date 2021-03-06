<?php

use App\Courier;
use App\Document;
use App\Sender;
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
        // Create admin
        $user = User::create([
            'id'                => 1,
            'name'              => 'Admin',
            'surname'           => 'Admin',
            'email'             => 'admin@example.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'id'                => 2,
            'name'              => 'Swagger',
            'surname'           => 'Swagger',
            'email'             => 'swagger@example.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
        ]);
        $user->assignRole(['admin', 'user', 'sender', 'courier']);

        $user = User::create([
            'id'                => 3,
            'name'              => 'Jurij',
            'surname'           => 'Gagarin',
            'email'             => 'gagarin@example.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
        ]);
        $user->assignRole(['admin', 'user', 'sender', 'courier']);

        // Create sender
        $user = User::create([
            'id'                => 4,
            'name'              => 'Sender',
            'surname'           => 'Sender',
            'email'             => 'sender@example.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
        ]);
        $document = Document::create([
            'list_document_type_id' => 1,
            'scan_front_path'       => '__DUMMY_SENDER_FRONT',
            'scan_front_filename'   => '__DUMMY_SENDER_FRONT_NAME',
            'scan_back_path'        => '__DUMMY_SENDER_BACK',
            'scan_back_filename'    => '__DUMMY_SENDER_BACK_NAME',
        ]);
        Sender::create([
            'user_id'              => $user->id,
            'document_id'          => $document->id,
            'agreement_checked_at' => now(),
        ]);
        $user->assignRole(['user', 'sender']);

        // Create courier
        $user = User::create([
            'id'                => 5,
            'name'              => 'Courier',
            'surname'           => 'Courier',
            'email'             => 'courier@example.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
        ]);
        $document = Document::create([
            'list_document_type_id' => 2,
            'scan_front_path'       => '__DUMMY_COURIER_FRONT',
            'scan_front_filename'   => '__DUMMY_SENDER_FRONT_NAME',
            'scan_back_path'        => null,
            'scan_back_filename'    => null,
        ]);
        Courier::create([
            'user_id'              => $user->id,
            'document_id'          => $document->id,
            'agreement_checked_at' => now(),
        ]);
        $user->assignRole(['user', 'courier']);

        // Create regular user
        $user = User::create([
            'id'                => 6,
            'name'              => 'User',
            'surname'           => 'User',
            'email'             => 'user@example.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
        ]);
        $user->assignRole('user');
    }

}
