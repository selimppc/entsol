<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntsolTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Group One
         */
        Schema::create('ac_group_one', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',45)->nullable();
            $table->string('title', 45)->nullable();
            $table->text('description')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        /*
         * Chart Of Accounts
         */


        Schema::create('ac_chart_of_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_code',64)->nullable();
            $table->text('description')->nullable();
            $table->enum('account_type',array('asset','liability','income','expenses'))->nullable();
            $table->enum('account_usage',array('ledger','ap','ar'))->nullable();
            $table->unsignedInteger('group_one_id')->nullable();
            $table->enum('analytical_code',array('cash','non-cash'))->nullable();
            $table->string('branch_code', 45)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->unsignedInteger('business_id')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('ac_chart_of_accounts', function($table) {
            $table->foreign('group_one_id')->references('id')->on('ac_group_one');
        });


        /*
         * Currency
         */


        Schema::create('cm_currency', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',45)->nullable();
            $table->string('title',45)->nullable();
            $table->text('description')->nullable();
            $table->decimal('exchange_rate',20,2)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        /*
         * Branch
         */


        Schema::create('cm_branch', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',45)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->decimal('exchange_rate', 20,2)->nullable();
            $table->string('contact_person', 45)->nullable();
            $table->text('billing_address')->nullable();
            $table->string('phone', 45)->nullable();
            $table->string('mobile', 45)->nullable();
            $table->string('fax', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('cm_branch', function($table) {
            $table->foreign('currency_id')->references('id')->on('cm_currency');
        });


        /*
         * Voucher Head
         */


        Schema::create('ac_voucher_head', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('account_type',array(
                'account-payable','account-receivable','account-adjustment','journal-voucher','receipt-voucher','reverse-entry'))->nullable();
            $table->date('date')->nullable();
            $table->string('reference', 45)->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('period')->nullable();
            $table->unsignedInteger('branch_id')->nullable();
            $table->text('note')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('ac_voucher_head', function($table) {
            $table->foreign('branch_id')->references('id')->on('cm_branch');
        });


        /*
         * Voucher Detail
         */


        Schema::create('ac_voucher_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('voucher_head_id')->nullable();
            $table->unsignedInteger('coa_id')->nullable();
            $table->string('sub_account_code', 45)->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->decimal('exchange_rate', 20,2)->nullable();
            $table->decimal('prime_amount', 20,2)->nullable();
            $table->decimal('base_amount', 20,2)->nullable();
            $table->string('branch', 45)->nullable();
            $table->text('note')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('ac_voucher_detail', function($table) {
            $table->foreign('coa_id')->references('id')->on('ac_chart_of_accounts');
        });

        Schema::table('ac_voucher_detail', function($table) {
            $table->foreign('currency_id')->references('id')->on('cm_currency');
        });

        Schema::table('ac_voucher_detail', function($table) {
            $table->foreign('voucher_head_id')->references('id')->on('ac_voucher_head');
        });


        /*
         * Balance
         */

        Schema::create('ac_balance', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('voucher_head_id')->nullable();
            $table->unsignedInteger('coa_id')->nullable();
            $table->string('sub_account_code', 45)->nullable();
            $table->date('date')->nullable();
            $table->string('branch', 45)->nullable();
            $table->string('reference', 45)->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('period')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->decimal('exchange_rate', 20,2)->nullable();
            $table->decimal('prime_amount', 20,2)->nullable();
            $table->decimal('base_amount', 20,2)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('ac_balance', function($table) {
            $table->foreign('coa_id')->references('id')->on('ac_chart_of_accounts');
        });

        Schema::table('ac_balance', function($table) {
            $table->foreign('currency_id')->references('id')->on('cm_currency');
        });

        Schema::table('ac_balance', function($table) {
            $table->foreign('voucher_head_id')->references('id')->on('ac_voucher_head');
        });


        /*
         * Allocation
         */


        Schema::create('ac_allocation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('voucher_head_id')->nullable();
            $table->string('invoice_number', 45)->nullable();
            $table->date('date')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->decimal('exchange_rate', 20,2)->nullable();
            $table->decimal('prime_amount', 20,2)->nullable();
            $table->decimal('base_amount', 20,2)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('ac_allocation', function($table) {
            $table->foreign('voucher_head_id')->references('id')->on('ac_voucher_head');
        });

        Schema::table('ac_allocation', function($table) {
            $table->foreign('currency_id')->references('id')->on('cm_currency');
        });


        /*
         * Default Offset
         */

        Schema::create('ac_default_offset', function (Blueprint $table) {
            $table->increments('id');
            $table->string('offset',45)->nullable();
            $table->string('pnl_account', 45)->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('period')->nullable();
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
        Schema::drop('ac_group_one');
        Schema::drop('ac_chart_of_accounts');
        Schema::drop('cm_currency');
        Schema::drop('cm_branch');
        Schema::drop('ac_voucher_head');
        Schema::drop('ac_voucher_detail');
        Schema::drop('ac_balance');
        Schema::drop('ac_allocation');
        Schema::drop('ac_default_offset');
    }
}
