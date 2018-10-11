<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListInsuranceRangesTable extends Migration
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

        Schema::create('list_insurance_ranges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('insurance_range', 16);
            $table->timestamps();
        });

        DB::table('list_insurance_ranges')->insert([
            [
                'insurance_range' => '0_99',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'insurance_range' => '100_499',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'insurance_range' => '500_MAX',
                'created_at'      => now(),
                'updated_at'      => now(),
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
        Schema::dropIfExists('list_insurance_ranges');
    }
}
