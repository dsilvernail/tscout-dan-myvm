<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateUsersTable extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
                Schema::create('users', function(Blueprint $table) {
                        $table->increments('id');
                        
                        $table
                                ->string('username')
                                ->nullabe() 
                                ->default(null);

                        $table
                                ->string('email')
                                ->default(null);

                        $table
                                ->string('password')
                                ->default(null);

                        $table
                                ->string('google_id');

                        $table
                                ->string('facebook_id');

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