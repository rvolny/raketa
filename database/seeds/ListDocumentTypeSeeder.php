<?php

use App\ListDocumentType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListDocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_document_types')->truncate();

        ListDocumentType::create(['document_type' => 'ID_CARD']);
        ListDocumentType::create(['document_type' => 'PASSPORT']);
    }

}
