<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRideSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('search')->default(0);
            $table->integer('fine')->default(0);
            $table->integer('km_1st')->default(0);
            $table->integer('price')->default(0);
            $table->integer('price2')->default(0);
            $table->integer('pkm_1st')->default(0);
            $table->integer('pprice')->default(0);
            $table->integer('pprice2')->default(0);
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
        Schema::dropIfExists('ride_settings');
    }
}
