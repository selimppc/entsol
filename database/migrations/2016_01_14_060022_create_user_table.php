<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        /*role_head*/

        Schema::create('role_head', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 64)->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 64)->nullable();
            $table->string('email', 64)->unique();
            $table->string('password', 64)->nullable();
            $table->string('auth_key', 128)->nullable();
            $table->string('access_token', 256)->nullable();
            $table->string('csrf_token', 64)->nullable();
            $table->string('ip_address', 32)->nullable();
            $table->dateTime('last_visit')->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->string('remember_token',64)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('user', function($table) {
            $table->foreign('role_id')->references('id')->on('role_head');
        });

        /*role_detail*/

        Schema::create('role_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_head_id')->nullable();
            $table->unsignedInteger('menu_panel_id')->nullable();
            $table->unsignedInteger('parent_menu_panel_id')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        /*user_profile*/

        Schema::create('user_profile', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('first_name',64)->nullable();
            $table->string('middle_name',64)->nullable();
            $table->string('last_name',64)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender',64)->nullable();
            $table->string('city',32)->nullable();
            $table->string('state',32)->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->integer('zip_code', false, 5)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('user_profile', function($table) {
            $table->foreign('user_id')->references('id')->on('user');
        });

        /*user_meta*/

        Schema::create('user_meta', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('fathers_name',64)->nullable();
            $table->string('mothers_name',64)->nullable();
            $table->string('fathers_occupation',64)->nullable();
            $table->string('fathers_phone',16)->nullable();
            $table->tinyInteger('freedom_fighter',false, 1)->nullable();
            $table->string('mothers_occupation',64)->nullable();
            $table->string('mothers_phone',16)->nullable();
            $table->string('national_id',16)->nullable();
            $table->string('driving_licence',16)->nullable();
            $table->string('passport',16)->nullable();
            $table->string('place_of_birth',64)->nullable();
            $table->string('marital_status',64)->nullable();
            $table->string('nationality',64)->nullable();
            $table->string('religion',64)->nullable();
            $table->string('signature',128)->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('user_meta', function($table) {
            $table->foreign('user_id')->references('id')->on('user');
        });

        /*user_image*/

        Schema::create('user_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 32)->nullable();
            $table->text('description')->nullable();
            $table->string('image', 256)->nullable();
            $table->string('thumbnail', 256)->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('user_image', function($table) {
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
        Schema::drop('user');
        Schema::drop('role_head');
        Schema::drop('role_detail');
        Schema::drop('user_profile');
        Schema::drop('user_meta');
        Schema::drop('user_image');
    }
}
