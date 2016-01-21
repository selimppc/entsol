<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChartOfAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_chart_of_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_code',64)->nullable();
            $table->text('description')->nullable();
            $table->enum('account_type',array('asset','liability','income','expenses'))->nullable();
            $table->enum('account_usage',array('ledger','ap','ar'))->nullable();
            $table->unsignedInteger('group_one_id')->nullable();
            $table->enum('analytical_code',array('cash','non-cash'))->nullable();
            $table->string('branch_code', 45)->nullable();
            $table->enum('status',array('active','inactive'))->nullable();
            $table->unsignedInteger('business_id')->nullable();
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
        Schema::drop('ac_chart_of_accounts');
    }
}
