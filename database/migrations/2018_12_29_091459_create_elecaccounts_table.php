<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElecaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elecaccounts', function (Blueprint $table) {
             $table->increments('id');
             $table->string('cname');
             $table->string('caddr');
             $table->string('cphno');
             $table->string('cemail');
             $table->string('clogo');
             $table->string('favicon');
             $table->string('timezone');
             $table->string('defaultprofileimg');

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
        Schema::dropIfExists('elecaccounts');
    }
}
