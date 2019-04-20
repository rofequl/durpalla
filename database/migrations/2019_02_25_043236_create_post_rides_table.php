<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_rides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('s_lat');
            $table->string('s_lng');
            $table->string('s_location');
            $table->string('e_lat');
            $table->string('e_lng');
            $table->string('e_location');
            $table->string('departure');
            $table->string('d_time');
            $table->string('d_time2');
            $table->string('return')->nullable();
            $table->string('r_time')->nullable();
            $table->string('r_time2')->nullable();
            $table->string('seat')->nullable();
            $table->string('condition')->nullable();
            $table->integer('car_id');
            $table->string('driver');
            $table->string('distance');
            $table->string('duration');
            $table->integer('user_id');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('post_rides');
    }
}
