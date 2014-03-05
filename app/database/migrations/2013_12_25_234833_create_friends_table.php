<?php

use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('friends', function( $table ) {
                    $table->increments('id');
                    $table->integer('user_id');
                    $table->integer('friend_id');
                    $table->timestamps();
                    $table->unique(array('user_id', 'friend_id'));
                    /* 
                    	when migrating to next stage of development will be adding composite key constraints
                    	$table->primary(array('user_id', 'friend_id')); 
                    */
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('friends');
	}

}