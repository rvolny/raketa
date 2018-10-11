<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListTransportationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @throws Exception
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction();

        Schema::create('list_transportation_types',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('transportation_type', 16);
                $table->timestamps();
            });

        DB::table('list_transportation_types')->insert([
            [
                'transportation_type' => 'CAR',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'transportation_type' => 'BUS',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'transportation_type' => 'TRAIN',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'transportation_type' => 'AIRPLANE',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'transportation_type' => 'BICYCLE',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'transportation_type' => 'FOOT',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
        ]);

        DB::commit();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_transportation_types');
    }
}
