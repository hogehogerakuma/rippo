<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('content');
            $table->string('goal_1');
            $table->string('goal_2')->nullable();
            $table->string('goal_3')->nullable();
            $table->integer('result_1');
            $table->integer('result_2')->nullable();
            $table->integer('result_3')->nullable();
            $table->string('object_1');
            $table->string('object_2')->nullable();
            $table->string('object_3')->nullable();
            $table->timestamps();
            
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
