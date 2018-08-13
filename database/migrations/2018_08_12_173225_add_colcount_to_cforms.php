<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColcountToCforms extends Migration
{
     public function up()
    {
        Schema::table('cforms', function (Blueprint $table) {
            //
            $table->string('colcount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cforms', function (Blueprint $table) {
            //
        });
    }
}
