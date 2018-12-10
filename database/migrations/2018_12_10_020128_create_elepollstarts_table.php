<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElepollstartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elepollstarts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('psname');
            
            $table->integer('blo_id')->unsigned();
            $table->foreign('blo_id')->references('id')->on('eleblos')->onDelete('cascade');

            $table->dateTime('pstarted_at');

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
        Schema::dropIfExists('elepollstarts');
    }
}
