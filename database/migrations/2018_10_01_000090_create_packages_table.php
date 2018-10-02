<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     * @see https://en.wikipedia.org/wiki/ISO_4217
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('senders_id')->unsigned();
            $table->integer('couriers_id')->unsigned();
            $table->text('contents');
            $table->string('photo_path')->nullable();
            $table->integer('list_package_types_id')->unsigned();
            $table->string('pickup_location');
            $table->date('pickup_date');
            $table->time('pickup_time')->nullable();
            $table->text('pickup_note')->nullable();
            $table->string('delivery_location');
            $table->date('delivery_date');
            $table->time('delivery_time')->nullable();
            $table->text('delivery_note')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('currency', 3)->default('EUR')->comment('ISO 4217');
            $table->decimal('price_max_increase', 8, 2)->nullable();
            $table->integer('list_insurance_ranges_id')->unsigned()->nullable();
            $table->string('alternative_contact')->nullable();
            $table->string('password')->nullable();
            $table->dateTimeTz('delivered_at')->nullable();
            $table->timestamps();

            $table->foreign('senders_id')->references('id')->on('senders');
            $table->foreign('couriers_id')->references('id')->on('couriers');
            $table->foreign('list_package_types_id')->references('id')
                ->on('list_package_types');
            $table->foreign('list_insurance_ranges_id')->references('id')
                ->on('list_insurance_ranges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
