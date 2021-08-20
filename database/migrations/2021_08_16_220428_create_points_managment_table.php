<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsManagmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points_managment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('transaction_id');
            $table->integer('reward_id');
            $table->integer('points');
            $table->string('type');
            $table->string('status');
            $table->boolean('flag');
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
        Schema::dropIfExists('points_managment');
    }
}
