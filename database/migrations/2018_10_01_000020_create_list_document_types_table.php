<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListDocumentTypesTable extends Migration
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

        Schema::create('list_document_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document_type', 16);
            $table->timestamps();
        });

        DB::table('list_document_types')->insert([
            [
                'document_type' => 'ID_CARD',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'document_type' => 'PASSPORT',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'document_type' => 'DRIVERS_LICENCE',
                'created_at'    => now(),
                'updated_at'    => now(),
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
        Schema::dropIfExists('list_document_types');
    }
}
