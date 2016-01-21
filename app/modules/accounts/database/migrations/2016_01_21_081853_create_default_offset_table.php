<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultOffsetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_default_offset', function (Blueprint $table) {
            $table->increments('id');
            $table->string('offset',45)->nullable();
            $table->string('pnl_account', 45)->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('period')->nullable();
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
        Schema::drop('ac_default_offset');
    }
}
