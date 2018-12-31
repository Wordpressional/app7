<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElemdistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('elemdists', function (Blueprint $collection) {
            $collection->index('did');
            $collection->string('distno');
            $collection->string('distname');
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
        //Schema::dropIfExists('elemdists');
        DB::connection('mongodb')->drop(['elemdists']);
    }
}
