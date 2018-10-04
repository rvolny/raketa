<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id_from')->unsigned()->nullable()
                ->comment('Null means the message is from system itself');
            $table->integer('users_id_to')->unsigned();
            $table->text('message');
            $table->dateTimeTz('received_at');
            $table->dateTimeTz('read_at')->nullable();
            $table->timestamps();

            $table->foreign('users_id_from')->references('id')->on('users');
            $table->foreign('users_id_to')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
