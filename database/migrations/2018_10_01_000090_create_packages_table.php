<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @see https://en.wikipedia.org/wiki/ISO_4217
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id_sender')->unsigned();
            $table->integer('user_id_courier')->unsigned()->nullable();
            $table->text('contents');
            $table->string('photo_path')->nullable();
            $table->integer('list_package_type_id')->unsigned();
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
            $table->integer('list_insurance_range_id')->unsigned()->nullable();
            $table->string('alternative_contact')->nullable();
            $table->string('password')->nullable();
            $table->integer('conversation_id')->unsigned()->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id_sender')->references('id')->on('users');
            $table->foreign('user_id_courier')->references('id')->on('users');
            $table->foreign('list_package_type_id')->references('id')
                ->on('list_package_types');
            $table->foreign('list_insurance_range_id')->references('id')
                ->on('list_insurance_ranges');
            $table->foreign('conversation_id')->references('id')
                ->on('conversations');
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
