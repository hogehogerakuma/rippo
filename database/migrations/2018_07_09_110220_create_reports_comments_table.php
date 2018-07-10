<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reports_id')->unsigned()->index();
            $table->integer('comments_id')->unsigned()->index();
            $table->timestamps();
            
            $table->foreign('reports_id')->references('id')->on('reports')->onDelete('cascade');
            $table->foreign('comments_id')->references('id')->on('comments')->onDelete('cascade');
            
            $table->unique(['reports_id','comments_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports_comments');
    }
}
