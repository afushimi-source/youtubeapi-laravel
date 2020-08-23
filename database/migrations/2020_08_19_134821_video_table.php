<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('videos', function (Blueprint $table) {
    	$table->increments('id');
    	$table->string('video_id');
    	$table->string('title');
    	$table->date('date');
    	$table->string('tag')->nullable();
    	$table->string('channel');
    	$table->string('channel_id');
    	$table->integer('rank');
    	$table->string('iframe')->nullable();
    	$table->string('thumbnail')->nullable();
    	$table->integer('viewCount')->nullable();
    	$table->integer('likeCount')->nullable();
    	$table->integer('dislikeCount')->nullable();
    	$table->integer('commentCount')->nullable();
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
        //
    }
}
