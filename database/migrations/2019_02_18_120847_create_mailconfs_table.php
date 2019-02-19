<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailconfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailconfs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('authu');
            $table->text('authp');
            $table->text('frome');
            $table->text('toe');
            $table->text('texte');
            $table->text('sube');
            $table->text('wele');
            $table->text('htmle');
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
        Schema::dropIfExists('mailconfs');
    }
}
