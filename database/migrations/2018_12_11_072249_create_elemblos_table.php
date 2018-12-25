<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElemblosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('elemblos', function (Blueprint $collection) {
            $collection->index('bloid');
            $collection->string('blophoneno');
            $collection->string('bloname');
            $collection->string('bloaddr');
            $collection->string('blodesignation');
            $collection->string('blocategory');
            $collection->integer('acno');
            $collection->integer('psno');
            $collection->integer('partno');
            $collection->integer('blono');
            $collection->integer('acid');
            $collection->integer('psid');
            $collection->integer('partid');
           
            $collection->integer('userid');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mongodb')->drop(['elemblos']);
    }
}
