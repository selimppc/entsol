<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_voucher_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('voucher_head_id')->nullable();
            $table->unsignedInteger('coa_id')->nullable();
            $table->string('sub_account_code', 45)->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->decimal('exchage_rate', 20,2)->nullable();
            $table->decimal('prime_amount', 20,2)->nullable();
            $table->decimal('base_amount', 20,2)->nullable();
            $table->string('branch', 45)->nullable();
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
        Schema::drop('ac_voucher_detail');
    }
}
