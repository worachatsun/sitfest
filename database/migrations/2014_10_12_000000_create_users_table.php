<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('username',11)->unique();
            $table->string('faculty')->nullable();
            $table->integer('tel');
            $table->string('email', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('role', 100)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->index('username');
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
