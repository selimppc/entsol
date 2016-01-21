<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherHeadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouhcer_head', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('account_type',array(
                'account-payable','account-receivable','account-adjustment','journal-vouche','receipt-voucher','reverse-entry'))->nullable();
            $table->date('date')->nullable();
            $table->string('referance', 45)->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('period')->nullable();
            $table->unsignedInteger('branch_id')->nullable();
            $table->text('note')->nullable();
            $table->enum('status',array('active','inactive'))->nullable();
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
        Schema::drop('vouhcer_head');
    }
}
