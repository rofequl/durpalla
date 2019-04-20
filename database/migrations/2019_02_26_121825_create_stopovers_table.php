<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stopovers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('going');
            $table->integer('target');
            $table->integer('price')->nullable();
            $table->integer('seat')->nullable();
            $table->integer('post_id');
            $table->string('date');
            $table->string('time');
            $table->string('time2');
            $table->string('distance');
            $table->string('duration');
            $table->string('edate')->nullable();
            $table->string('etime')->nullable();
            $table->string('etime2')->nullable();
            $table->string('status')->default(0);
            $table->string('payment')->default(0);
            $table->string('tracking');
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
        Schema::dropIfExists('stopovers');
    }
}
