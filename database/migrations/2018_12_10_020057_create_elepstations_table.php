<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElepstationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elepstations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('psno');
            $table->string('psname');
            $table->integer('ac_id')->unsigned();
            $table->foreign('ac_id')->references('id')->on('eleacs');
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
        Schema::dropIfExists('elepstations');
    }
}
