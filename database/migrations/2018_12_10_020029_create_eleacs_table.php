<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEleacsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleacs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('acno');
            $table->string('acname');
            $table->integer('dist_id')->unsigned();
            $table->foreign('dist_id')->references('id')->on('eledists');
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
        Schema::dropIfExists('eleacs');
    }
}
