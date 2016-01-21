<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',45)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->decimal('exchage_rate', 20,2)->nullable();
            $table->string('contact_person', 45)->nullable();
            $table->text('billing_address')->nullable();
            $table->string('phone', 45)->nullable();
            $table->string('mobile', 45)->nullable();
            $table->string('fax', 45)->nullable();
            $table->string('email', 45)->nullable();
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
        Schema::drop('branch');
    }
}
