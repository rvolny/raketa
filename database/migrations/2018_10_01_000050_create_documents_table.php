<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('list_document_type_id')->unsigned();
            $table->string('scan_front_path');
            $table->string('scan_front_filename');
            $table->string('scan_back_path')->nullable();
            $table->string('scan_back_filename')->nullable();
            $table->timestamps();

            $table->foreign('list_document_type_id')->references('id')
                ->on('list_document_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
