<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*user*/

        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 64)->nullable();
            $table->string('email', 64)->unique();
            $table->string('password', 64)->nullable();
            $table->string('auth_key', 128)->nullable();
            $table->string('access_token', 256)->nullable();
            $table->string('csrf_token', 64)->nullable();
            $table->string('ip_address', 32)->nullable();
            $table->unsignedInteger('branch_id')->nullable();
            $table->dateTime('last_visit')->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->string('remember_token',64)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('user', function($table) {
            $table->foreign('branch_id')->references('id')->on('cm_branch');
        });

        /*role*/

        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 64)->nullable();
            $table->string('slug',64)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        /*role_user*/

        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('remember_token',64)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('role_user', function($table) {
            $table->foreign('role_id')->references('id')->on('role_user');
            $table->foreign('user_id')->references('id')->on('user');
        });

        /*permissions*/

        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 64)->nullable();
            $table->string('slug',64)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        /*permission_role*/

        Schema::create('permission_role', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('permission_id')->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('permission_role', function($table) {
            $table->foreign('permission_id')->references('id')->on('permissions');
            $table->foreign('role_id')->references('id')->on('role');
        });

        /*role_head*/

        /*Schema::create('user_role_head', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 64)->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });*/

        /*user_role_detail*/

        /*Schema::create('user_role_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_role_head_id')->nullable();
            $table->unsignedInteger('menu_panel_id')->nullable();
            $table->unsignedInteger('parent_menu_panel_id')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });*/

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
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('user_image', function($table) {
            $table->foreign('user_id')->references('id')->on('user');
        });

        Schema::create('user_reset_password', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('reset_password_token', 32)->nullable();
            $table->string('reset_password_expire', 32)->nullable();
            $table->string('reset_password_time', 32)->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('user_reset_password', function($table) {
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
        Schema::drop('role');
        Schema::drop('role_user');
        Schema::drop('permissions');
        Schema::drop('permission_role');
        //Schema::drop('user_role_head');
        //Schema::drop('user_role_detail');
        Schema::drop('user_profile');
        Schema::drop('user_meta');
        Schema::drop('user_image');
        Schema::drop('user_reset_password');
    }
}
