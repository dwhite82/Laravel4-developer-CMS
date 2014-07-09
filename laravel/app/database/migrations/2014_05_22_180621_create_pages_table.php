<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pages', function($table){
            $table->increments('id')->unsigned();
            $table->integer('category_id')->default(1)->unsigned();
            $table->integer('parent_id')->default(0)->unsigned();
            $table->string('title', 100);
            $table->string('permalink', 100)->unique();
            $table->integer('position')->default(0)->unsigned();
            $table->string('template', 50)->default('page');
            $table->boolean('visible')->default(false);
            $table->boolean('subnav')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->index('parent_id');
            $table->foreign('category_id')->references('id')->on('categories');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('pages');
	}

}
