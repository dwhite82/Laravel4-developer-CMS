<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function($table){
            $table->increments('id')->unsigned();
            $table->string('first_name', 25);
            $table->string('last_name', 50);
            $table->string('email', 100)->unique();
            $table->string('username', 25)->unique();
            $table->enum('role', array('developer', 'admin', 'user'));
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
            $table->boolean('active');
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
        Schema::drop('users');
	}

}
