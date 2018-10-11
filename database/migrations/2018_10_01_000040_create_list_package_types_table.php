<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListPackageTypesTable extends Migration
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

        Schema::create('list_package_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_type', 16);
            $table->timestamps();
        });

        DB::table('list_package_types')->insert([
            [
                'package_type' => 'ENVELOPE_A4',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'package_type' => 'ENVELOPE_A5',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'package_type' => 'PACKAGE_SMALL',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'package_type' => 'PACKAGE_MEDIUM',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'package_type' => 'PACKAGE_LARGE',
                'created_at'   => now(),
                'updated_at'   => now(),
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
        Schema::dropIfExists('list_package_types');
    }
}
