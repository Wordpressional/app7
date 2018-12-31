<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEleblosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleblos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bloname');
            $table->string('blophno');
            $table->text('bloaddr');
            $table->string('blodesg');
            $table->string('distno');
            $table->string('acno');
            $table->string('psno');
            $table->string('partno');
            $table->text('bloresaddr');

            $table->integer('part_id')->unsigned();
            $table->foreign('part_id')->references('id')->on('eleparts');

            $table->integer('dist_id')->unsigned();
            $table->foreign('dist_id')->references('id')->on('eledists');

            $table->integer('ac_id')->unsigned();
            $table->foreign('ac_id')->references('id')->on('eleacs');

            $table->integer('ps_id')->unsigned();
            $table->foreign('ps_id')->references('id')->on('elepstations');


            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('eleblos');
    }
}
