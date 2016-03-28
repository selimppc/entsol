<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*product_category*/

        Schema::create('product_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable();
            $table->string('code',8)->nullable();
            $table->text('description',256)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        /*product_group*/

        Schema::create('product_group', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_category_id')->nullable();
            $table->string('title',64)->nullable();
            $table->string('code',8)->nullable();
            $table->text('description',256)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('product_group', function($table) {
            $table->foreign('product_category_id')->references('id')->on('product_category');
        });

        /*business*/

        Schema::create('business', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable();
            $table->text('description',256)->nullable();
            $table->text('address',256)->nullable();
            $table->string('contact_person',64)->nullable();
            $table->string('phone',16)->nullable();
            $table->string('fax',16)->nullable();
            $table->string('email',64)->nullable();
            $table->string('emergency_contact_person',64)->nullable();
            $table->string('emergency_contact_number',64)->nullable();
            $table->boolean('is_sub_contact');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        /*product*/

        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id')->nullable();
            $table->unsignedInteger('product_group_id')->nullable();
            $table->unsignedInteger('product_category_id')->nullable();
            $table->string('title',64)->nullable();
            $table->string('code',8)->nullable();
            $table->text('description',256)->nullable();
            $table->string('image',128)->nullable();
            $table->float('cost_price',8,2)->nullable();
            $table->string('purchase_unit',16)->nullable();
            $table->unsignedInteger('purchase_unit_qty')->nullable();
                $table->string('stock_unit',16)->nullable();
            $table->integer('stock_unit_qty')->unsigned()->nullable();
            $table->enum('stock_type',array('stock','non-stock'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('product', function($table) {
            $table->foreign('business_id')->references('id')->on('business');
            $table->foreign('product_group_id')->references('id')->on('product_group');
            $table->foreign('product_category_id')->references('id')->on('product_category');
        });


         /*store*/

        Schema::create('store', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id')->nullable();
            $table->string('title',64)->nullable();
            $table->string('code',8)->nullable();
            $table->text('description',256)->nullable();
            $table->text('address',256)->nullable();
            $table->string('phone',8)->nullable();
            $table->string('email',8)->nullable();
            $table->string('fax',25)->nullable();
            $table->string('web',8)->nullable();
            $table->string('contact_person',64)->nullable();
            $table->string('contact_name',64)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('store', function($table) {
            $table->foreign('business_id')->references('id')->on('business');
        });


        /*currency*/

        Schema::create('currency', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable();
            $table->text('description',256)->nullable();
            $table->float('exchange_rate',8,2)->nullable();
            #$table->enum('status',array('active','cancel'))->nullable();
            $table->boolean('status');
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
        Schema::drop('product_category');
        Schema::drop('product_group');
        Schema::drop('business');
        Schema::drop('product');
        Schema::drop('store');
        Schema::drop('currency');

    }
}
