<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntsolTableAccounts extends Migration
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
            $table->string('code',64)->unique();
            $table->string('title', 64)->unique();
            $table->text('description')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        /*
         * Currency
         */


        Schema::create('cm_currency', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',64)->unique();
            $table->string('title',64)->unique();
            $table->text('description')->nullable();
            $table->decimal('exchange_rate',20,6)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        /*
         * Branch
         */


        Schema::create('cm_branch', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',64)->unique();
            $table->string('title',64)->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->decimal('exchange_rate', 20,6)->nullable();
            $table->string('contact_person', 64)->nullable();
            $table->text('billing_address')->nullable();
            $table->string('phone', 64)->nullable();
            $table->string('mobile', 64)->nullable();
            $table->string('fax', 64)->nullable();
            $table->string('email', 64)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('cm_branch', function($table) {
            $table->foreign('currency_id')->references('id')->on('cm_currency');
        });


        /*
         * Chart Of Accounts
         */


        Schema::create('ac_chart_of_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_code',64)->unique();
            $table->string('title',128)->unique();
            $table->text('description')->nullable();
            $table->enum('account_type',array('asset','liability','income','expenses','revenues'))->nullable();
            $table->enum('account_usage',array('ledger','ap','ar'))->nullable();
            $table->unsignedInteger('group_one_id')->nullable();
            $table->enum('analytical_code',array('cash','non-cash'))->nullable();
            $table->unsignedInteger('branch_id')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->unsignedInteger('business_id')->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('ac_chart_of_accounts', function($table) {
            $table->foreign('group_one_id')->references('id')->on('ac_group_one');
        });

        Schema::table('ac_chart_of_accounts', function($table) {
            $table->foreign('branch_id')->references('id')->on('cm_branch');
        });


        /*
         * Voucher Head
         */


        Schema::create('ac_voucher_head', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voucher_number', 64)->unique();
            $table->enum('account_type',array(
                'account-payable','account-receivable','account-adjustment','journal-voucher','payment-voucher','receipt-voucher','reverse-entry'))->nullable();
            $table->date('date')->nullable();
            $table->text('reference')->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('period')->nullable();
            $table->unsignedInteger('branch_id')->nullable();
            $table->text('note')->nullable();
            $table->enum('status',array('open','posted','balanced','suspend','active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
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
            $table->string('voucher_number', 64)->nullable();
            $table->unsignedInteger('coa_id')->nullable();
            $table->string('account_code', 64)->nullable();
            $table->string('sub_account_code', 64)->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->decimal('exchange_rate', 20,6)->nullable();
            $table->decimal('prime_amount', 20,6)->nullable();
            $table->decimal('base_amount', 20,6)->nullable();
            $table->unsignedInteger('branch_id')->nullable();
            $table->text('note')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('ac_voucher_detail', function($table) {
            $table->foreign('voucher_head_id')->references('id')->on('ac_voucher_head');
        });

        Schema::table('ac_voucher_detail', function($table) {
            $table->foreign('coa_id')->references('id')->on('ac_chart_of_accounts');
        });

        Schema::table('ac_voucher_detail', function($table) {
            $table->foreign('currency_id')->references('id')->on('cm_currency');
        });

        Schema::table('ac_voucher_detail', function($table) {
            $table->foreign('branch_id')->references('id')->on('cm_branch');
        });




        /*
         * Balance
         */

        Schema::create('ac_balance', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('voucher_head_id')->nullable();
            $table->string('voucher_number', 64)->nullable();
            $table->unsignedInteger('coa_id')->nullable();
            $table->string('account_code', 64)->nullable();
            $table->string('sub_account_code', 64)->nullable();
            $table->date('date')->nullable();
            $table->unsignedInteger('branch_id')->nullable();
            $table->string('branch', 64)->nullable();
            $table->text('reference')->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('period')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->decimal('exchange_rate', 20,6)->nullable();
            $table->decimal('prime_amount', 20,6)->nullable();
            $table->decimal('base_amount', 20,6)->nullable();
            $table->string('status', 16)->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('ac_balance', function($table) {
            $table->foreign('voucher_head_id')->references('id')->on('ac_voucher_head');
        });

        Schema::table('ac_balance', function($table) {
            $table->foreign('coa_id')->references('id')->on('ac_chart_of_accounts');
        });

        Schema::table('ac_balance', function($table) {
            $table->foreign('branch_id')->references('id')->on('cm_branch');
        });

        Schema::table('ac_balance', function($table) {
            $table->foreign('currency_id')->references('id')->on('cm_currency');
        });




        /*
         * Allocation
         */


        Schema::create('ac_allocation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('voucher_head_id')->nullable();
            $table->string('invoice_number', 64)->unique();
            $table->date('date')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->decimal('exchange_rate', 20,6)->nullable();
            $table->decimal('prime_amount', 20,6)->nullable();
            $table->decimal('base_amount', 20,6)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
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
            $table->string('offset',64)->unique();
            $table->string('pnl_account', 64)->unique();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('period')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        /*
         * Settings
         */

        Schema::create('ac_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',array(
                'account-payable','account-receivable','account-adjustment','journal-voucher','payment-voucher','receipt-voucher','reverse-entry'))->nullable();
            $table->string('code',4)->unique();
            $table->string('title',64)->unique();
            $table->unsignedInteger('last_number')->nullable();
            $table->unsignedInteger('increment')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });





        /*
         * View GL(General Ledger) Transaction
         */
        DB::statement( 'CREATE VIEW vw_gl_trn AS (
            SELECT
                `a`.`voucher_head_id` AS `voucher_head_id`,
                `a`.`voucher_number` AS `voucher_number`,
                `c`.`reference` AS `reference`,
                `c`.`date` AS `date`,
                `c`.`year` AS `year`,
                `c`.`period` AS `period`,
                `c`.`branch_id` AS `branch_id`,
                `a`.`coa_id` AS `coa_id`,
                `a`.`account_code` AS `account_code`,
                `b`.`title` AS `title`,
                (CASE
                WHEN (`a`.`base_amount` > 0) THEN `a`.`base_amount`
                END) AS `debit`,
                (CASE
                WHEN (`a`.`base_amount` < 0) THEN ABS(`a`.`base_amount`)
                END) AS `credit`
                FROM
                ((`entsol`.`ac_voucher_detail` `a`
                JOIN `entsol`.`ac_chart_of_accounts` `b`)
                JOIN `entsol`.`ac_voucher_head` `c`)
                WHERE
                ((`a`.`coa_id` = `b`.`id`)
                AND (`a`.`voucher_head_id` = `c`.`id`))
        )'
        );



        /*
         * View Voucher
         */

        DB::statement( 'CREATE VIEW vw_voucher AS (
            SELECT
                `a`.`voucher_head_id` AS `voucher_head_id`,
                `a`.`voucher_number` AS `voucher_number`,
                `a`.`coa_id` AS `coa_id`,
                `a`.`account_code` AS `account_code`,
                `b`.`title` AS `title`,
                `a`.`sub_account_code` AS `sub_account_code`,
                `a`.`currency_id` AS `currency_id`,
                `a`.`exchange_rate` AS `exchange_rate`,
                (CASE
                WHEN (`a`.`prime_amount` > 0) THEN `a`.`prime_amount`
                END) AS `prime_debit`,
                (CASE
                WHEN (`a`.`prime_amount` < 0) THEN ABS(`a`.`prime_amount`)
                END) AS `prime_credit`,
                (CASE
                WHEN (`a`.`base_amount` > 0) THEN `a`.`base_amount`
                END) AS `base_debit`,
                (CASE
                WHEN (`a`.`base_amount` < 0) THEN ABS(`a`.`base_amount`)
                END) AS `base_credit`
                FROM
                (`entsol`.`ac_voucher_detail` `a`
                JOIN `entsol`.`ac_chart_of_accounts` `b` ON ((`a`.`coa_id` = `b`.`id`)))
        )'
        );




        /*
         * View Chart Of Accounts
         */

        DB::statement( 'CREATE VIEW vw_chart_of_ac AS (
            SELECT
              `a`.`id`              AS `id`,
              `a`.`account_type`    AS `account_type`,
              CONCAT(`b`.`code`,\'-\',`b`.`title`) AS `group_one`,
              `a`.`account_code`    AS `account_code`,
              `a`.`title`           AS `account_title`,
              `a`.`account_usage`   AS `account_usage`,
              `a`.`analytical_code` AS `analytical_code`,
              `a`.`status`          AS `status`
            FROM (`ac_chart_of_accounts` `a`
               LEFT JOIN `ac_group_one` `b`
                 ON ((`a`.`group_one_id` = `b`.`id`)))
        )'
        );
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
        Schema::drop('vw_gl_trn');
        Schema::drop('vw_voucher');
        Schema::drop('vw_chart_of_ac');
    }
}
