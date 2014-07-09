<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('posts', function($table){
            $table->increments('id')->unsigned();
            $table->integer('page_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('title', 100);
            $table->integer('position')->default(0)->unsigned();
            $table->boolean('visible')->default(false);
            $table->enum('content_placement', array('content','infobar','body'))->default('content');
            $table->enum('content_type', array('HTML', 'code'))->default('HTML');
            $table->string('container_attr')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
            $table->foreign('page_id')->references('id')->on('pages');
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
        Schema::drop('posts');
	}

}
