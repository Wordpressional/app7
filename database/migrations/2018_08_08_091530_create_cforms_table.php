<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cforms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cformname')->unique();
            $table->longtext('htmlelements');
            $table->text('cshortcode');
            $table->string('cstatus');
            $table->string('cispublic');
            $table->softDeletes();
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
        Schema::dropIfExists('cforms');
    }
}
