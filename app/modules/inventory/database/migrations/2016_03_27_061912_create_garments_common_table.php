<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarmentsCommonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*garments_common.......*/

        /*buyer*/

        Schema::create('buyer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable();
            $table->text('description',256)->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->text('details',256)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('buyer', function($table) {

            if(Schema::hasTable('country'))
            {
                $table->foreign('country_id')->references('id')->on('country');
            }
        });


        /*yarn_count*/

        Schema::create('yarn_count', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable();
            $table->text('description',256)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        /*yarn_composition*/

        Schema::create('yarn_composition', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable();
            $table->text('description',256)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        /*product_brand*/

        Schema::create('product_brand', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable();
            $table->string('code',64)->nullable();
            $table->text('description',256)->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        /*yarn_type*/

        Schema::create('yarn_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable();
            $table->text('description',256)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        /*yarn_color*/

        Schema::create('yarn_color', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable();
            $table->text('description',256)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('buyer');
        Schema::drop('yarn_count');
        Schema::drop('yarn_composition');
        Schema::drop('yarn_type');
        Schema::drop('yarn_color');
        Schema::drop('product_brand');
    }
}
