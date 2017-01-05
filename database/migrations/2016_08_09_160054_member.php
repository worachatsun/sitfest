<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Member extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('members', function (Blueprint $table) {
        $table->string('std_id',11);
        $table->string('name', 100);
        $table->string('surname', 100);
        $table->integer('tel');
        $table->string('email', 100);
        $table->string('facebook', 100)->nullable();
        $table->string('faculty', 100);
        $table->string('role', 100)->nullable();
        $table->timestamps();
        $table->primary('std_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
