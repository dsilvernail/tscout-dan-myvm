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
                                ->nullable()
                                ->default(null);

                        $table
                                ->string('password')
                                ->nullable()
                                ->default(null);

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