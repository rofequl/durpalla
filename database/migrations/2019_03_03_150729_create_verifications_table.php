<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nid')->nullable();
            $table->boolean('nid_status')->default(0);
            $table->string('passport')->nullable();
            $table->boolean('passport_status')->default(0);
            $table->string('driving')->nullable();
            $table->boolean('driving_status')->default(0);
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('verifications');
    }
}
