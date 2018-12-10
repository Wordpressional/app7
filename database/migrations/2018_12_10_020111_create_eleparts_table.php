<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleparts', function (Blueprint $table) {
            $table->increments('id');
             $table->string('partsno');
            $table->string('partsname');
            $table->integer('ps_id')->unsigned();
            $table->foreign('ps_id')->references('id')->on('elepstations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleparts');
    }
}
