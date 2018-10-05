<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('courier_id')->unsigned();
            $table->string('destination', 256);
            $table->string('recurrence', 256);
            $table->integer('list_transportation_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('courier_id')->references('id')->on('couriers');
            $table->foreign('list_transportation_type_id')->references('id')
                ->on('list_transportation_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_routes');
    }
}
