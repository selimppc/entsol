<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*transfer_detail*/

        Schema::create('transfer_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transfer_hd_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('store_id')->nullable();
            $table->string('unit',8)->nullable();
            $table->unsignedInteger('qty')->nullable();
            $table->float('price',8,2)->nullable();
            $table->float('transfer_value',8,2)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('transfer_detail', function($table) {
            $table->foreign('transfer_hd_id')->references('id')->on('transfer_head');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('store_id')->references('id')->on('store');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
