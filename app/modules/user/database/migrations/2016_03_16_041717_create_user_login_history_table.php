<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLoginHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*user-login history*/
    public function up()
    {
        Schema::create('user_login_history', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->dateTime('login_time',64)->nullable();
            $table->dateTime('logout_time',64)->nullable();
            $table->string('ip_address', 32)->nullable();
            $table->dateTime('date',64)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('user_login_history', function($table) {
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_login_history');
    }
}
