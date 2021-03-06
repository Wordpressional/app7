<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElemactivitylogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('elemactivitylogs', function (Blueprint $collection) {
            
            $collection->index('actid');
            $collection->string('username');
            $collection->string('useremail');
            $collection->string('userrole');
            $collection->string('eventname');
            $collection->text('devicedetails');
            $collection->string('userid');
            $collection->string('bloid');
            $collection->string('timestamp');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mongodb')->drop(['elemactivitylogs']);
    }
}
