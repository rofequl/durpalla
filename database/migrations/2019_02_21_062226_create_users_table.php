<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable();
            $table->string('phone_verify')->nullable();
            $table->string('name');
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->integer('user_id');
            $table->string('image');
            $table->string('password')->nullable();
            $table->string('token')->nullable();
            $table->string('facebook_id')->nullable();
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
        Schema::dropIfExists('users');
    }
}
