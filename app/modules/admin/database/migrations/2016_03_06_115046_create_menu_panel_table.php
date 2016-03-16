<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuPanelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Menu Panel
         */

        Schema::create('menu_panel', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('menu_id');
            $table->enum('menu_type',array('ROOT','MODU','MENU','SUBM'))->nullable();
            $table->string('menu_name',64)->unique();
            $table->string('route',64);
            $table->unsignedInteger('parent_menu_id')->nullable();
            $table->string('icon_code',128)->nullable();
            $table->unsignedInteger('menu_order');
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
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
        Schema::drop('menu_panel');
    }
}
