<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElempollstartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('elempollstarts', function (Blueprint $collection) {
            $collection->index('pollid');
            $collection->string('pollstartedon');
            $collection->integer('userid');
            $collection->integer('bloid');
            $collection->string('timestamp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mongodb')->drop(['elempollstarts']);
    }
}
