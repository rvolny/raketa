<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportationOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportation_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('senders_id')->unsigned();
            $table->integer('couriers_id')->unsigned()->nullable();
            $table->integer('packages_id')->unsigned();
            $table->enum('state',
                [
                    'WAITING',          // New package waiting for courier
                    'ACCEPTED_COURIER', // Accepted by courier, waiting for sender
                    'REJECTED_COURIER', // Rejected by courier
                    'REJECTED_SENDER',  // Rejected by sender
                    'AGREED',           // Accepted by courier and sender
                    'EXPIRED',          // Package expired
                    'CANCELLED',        // Package cancelled by sender
                ]);
            $table->timestamps();

            $table->foreign('senders_id')->references('id')->on('senders');
            $table->foreign('couriers_id')->references('id')->on('couriers');
            $table->foreign('packages_id')->references('id')->on('packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transportation_offers');
    }
}
