<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentHeadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*adjustment_head*/

        Schema::create('adjustment_head', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->unsignedInteger('store_id')->nullable();
            $table->string('adj_no',45)->nullable();
            $table->dateTime('date',64)->nullable();
            $table->dateTime('confirm_date',64)->nullable();
            $table->string('type',45)->nullable();
            $table->string('voucher_number',45)->nullable();
            $table->text('note',256)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adjustment_head', function($table) {
            $table->foreign('business_id')->references('id')->on('business');
            $table->foreign('currency_id')->references('id')->on('currency');
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
