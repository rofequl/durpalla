<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_rides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('s_lat');
            $table->string('s_lng');
            $table->string('s_location');
            $table->string('e_lat');
            $table->string('e_lng');
            $table->string('e_location');
            $table->string('after');
            $table->string('before');
            $table->string('seat');
            $table->integer('user_id');
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
        Schema::dropIfExists('request_rides');
    }
}
