<?php

use Illuminate\Database\Seeder;

class ConversationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conversations = Array();

        array_push($conversations, [1, 4]);
        array_push($conversations, [1, 5]);
        array_push($conversations, [4, 5]);

        foreach ($conversations as $c) {
            $conversation = App\Conversation::create([
                'user_id_lo' => $c[0],
                'user_id_hi' => $c[1],
            ]);

            for ($f = 0; $f < rand(0, 20); $f++) {
                $conversation->messages()
                    ->save(factory(App\Message::class)->make([
                        'user_id_from' => $c[rand(0, 1)],
                    ]));
            };
        }
    }
}