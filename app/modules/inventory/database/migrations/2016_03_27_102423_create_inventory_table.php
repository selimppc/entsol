<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*inventory*/

        /*inv_supplier*/

        Schema::create('inv_supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',64)->nullable();
            $table->string('code',8)->nullable();
            $table->text('description',256)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        /*inv_requisition_head*/

        Schema::create('inv_requisition_head', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('store_id')->nullable();
            $table->unsignedInteger('buyer_id')->nullable();
            $table->string('req_no',16)->nullable();
            $table->string('buyer_order_no',64)->nullable();
            $table->unsignedInteger('buyer_order_qty')->nullable();
            $table->enum('requisition_type',array(''))->nullable();
            $table->enum('status',array('active','cancel','approved'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_requisition_head', function($table) {
            $table->foreign('business_id')->references('id')->on('business');
            $table->foreign('supplier_id')->references('id')->on('inv_supplier');
            $table->foreign('buyer_id')->references('id')->on('buyer');
            $table->foreign('store_id')->references('id')->on('store');
        });

        /*inv_requisition_detail*/

        Schema::create('inv_requisition_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('req_hd_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->string('unit',8)->nullable();
            $table->unsignedInteger('qty')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_requisition_detail', function($table) {
            $table->foreign('req_hd_id')->references('id')->on('inv_requisition_head');
            $table->foreign('product_id')->references('id')->on('product');
        });



        /*inv_purchase_order_head*/

        Schema::create('inv_purchase_order_head', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('business_id')->nullable();
            $table->unsignedInteger('buyer_id')->nullable();
            $table->unsignedInteger('req_hd_id')->nullable();
            $table->string('buyer_order_no',64)->nullable();
            $table->unsignedInteger('buyer_order_qty')->nullable();
            $table->string('po_no',16)->nullable();
            $table->enum('pay_terms',array(''))->nullable();
            $table->dateTime('delivery_date',64)->nullable();
            $table->float('tax',8,2)->nullable();
            $table->double('tax_amount',16,2)->nullable();
            $table->float('discount_rate',8,2)->nullable();
            $table->double('discount_amount',16,2)->nullable();
            $table->double('amount',16,2)->nullable();
            $table->enum('status',array('active','cancel','approved'))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_purchase_order_head', function($table) {
            $table->foreign('business_id')->references('id')->on('business');
            $table->foreign('buyer_id')->references('id')->on('buyer');
            $table->foreign('req_hd_id')->references('id')->on('inv_requisition_head');

        });

        /*inv_purchase_order_detail*/


        Schema::create('inv_purchase_order_detail', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('po_hd_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('yarn_count_id')->nullable();
            $table->unsignedInteger('yarn_type_id')->nullable();
            $table->unsignedInteger('yarn_composition_id')->nullable();
            $table->unsignedInteger('yarn_color_id')->nullable();
            $table->unsignedInteger('qty')->nullable();
            $table->unsignedInteger('grn_qty')->nullable();
            $table->float('tax_rate',8,2)->nullable();
            $table->double('tax_amount',16,2)->nullable();
            $table->string('unit',45)->nullable();
            $table->unsignedInteger('unit_qty')->nullable();
            $table->float('purchase_rate',8,2)->nullable();
            $table->double('amount',16,2)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_purchase_order_detail', function($table) {
            $table->foreign('po_hd_id')->references('id')->on('inv_purchase_order_head');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('yarn_count_id')->references('id')->on('yarn_count');
            $table->foreign('yarn_type_id')->references('id')->on('yarn_type');
            $table->foreign('yarn_composition_id')->references('id')->on('yarn_composition');
            $table->foreign('yarn_color_id')->references('id')->on('yarn_color');

        });

        /* inv_grn_head*/

        Schema::create('inv_grn_head', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('business_id')->nullable();
            $table->unsignedInteger('po_hd_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('req_hd_id')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->unsignedInteger('buyer_id')->nullable();
            $table->integer('buyer_order_id',false,11)->nullable();
            $table->unsignedInteger('store_id')->nullable();
            $table->string('grn_no',16)->nullable();
            $table->string('voucher_no',16)->nullable();
            $table->string('lc_no',16)->nullable();
            $table->dateTime('date',64)->nullable();
            $table->enum('pay_terms',array(''))->nullable();
            $table->float('tax_rate',8,2)->nullable();
            $table->double('tax_amount',16,2)->nullable();
            $table->float('discount_rate',8,2)->nullable();
            $table->double('discount_amount',16,2)->nullable();
            $table->double('amount',16,2)->nullable();
            $table->double('net_amount',16,2)->nullable();
            $table->enum('status',array('active','cancel','approved'))->nullable();
            $table->enum('opening_stock',array('yes','no'))->nullable();
            $table->string('receive_item',45)->nullable();
            $table->string('receive_basis',45)->nullable();
            $table->string('challan_no',64)->nullable();
            $table->text('note',256)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_grn_head', function($table) {
            $table->foreign('business_id')->references('id')->on('business');
            $table->foreign('po_hd_id')->references('id')->on('inv_purchase_order_head');
            $table->foreign('supplier_id')->references('id')->on('inv_supplier');
            $table->foreign('req_hd_id')->references('id')->on('inv_requisition_head');
            $table->foreign('currency_id')->references('id')->on('currency');
            $table->foreign('buyer_id')->references('id')->on('buyer');
            $table->foreign('store_id')->references('id')->on('store');
        });


        /*inv_grn_detail*/

        Schema::create('inv_grn_detail', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('grn_hd_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('yarn_count_id')->nullable();
            $table->unsignedInteger('yarn_type_id')->nullable();
            $table->unsignedInteger('yarn_composition_id')->nullable();
            $table->unsignedInteger('yarn_color_id')->nullable();
            $table->unsignedInteger('yarn_lot_id')->nullable();
            $table->string('batch_number',45)->nullable();
            $table->dateTime('expiry_date',64)->nullable();
            $table->unsignedInteger('receive_qty')->nullable();
            $table->float('cost_price',8,2)->nullable();
            $table->unsignedInteger('unit_qty')->nullable();
            $table->float('tax_rate',8,2)->nullable();
            $table->double('tax_amount',16,2)->nullable();
            $table->float('discount_rate',8,2)->nullable();
            $table->double('discount_amount',16,2)->nullable();
            $table->string('ILE',45)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_grn_detail', function($table) {
            $table->foreign('grn_hd_id')->references('id')->on('inv_grn_head');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('yarn_count_id')->references('id')->on('yarn_count');
            $table->foreign('yarn_type_id')->references('id')->on('yarn_type');
            $table->foreign('yarn_composition_id')->references('id')->on('yarn_composition');
            $table->foreign('yarn_color_id')->references('id')->on('yarn_color');
            $table->foreign('yarn_lot_id')->references('id')->on('yarn_lot');
        });

        /*inv_transaction*/

        Schema::create('inv_transaction', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('business_id')->nullable();
            $table->unsignedInteger('buyer_id')->nullable();
            $table->unsignedInteger('grn_hd_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('store_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->enum('transaction_type',array(''))->nullable();
            $table->string('trn_no',16)->nullable();
            $table->string('batch_number',45)->nullable();
            $table->dateTime('date',64)->nullable();
            $table->dateTime('expiry_date',64)->nullable();
            $table->string('unit',16)->nullable();
            $table->unsignedInteger('qty')->nullable();
            $table->float('rate',8,2)->nullable();
            $table->float('total_price',8,2)->nullable();
            $table->enum('sign',array('-1','1'))->nullable();
            $table->text('note',256)->nullable();
            $table->string('voucher_no',16)->nullable();
            $table->string('wo_pi_no',16)->nullable();
            $table->enum('status',array('active','cancel','approved'))->nullable();
            $table->integer('buyer_order_id',false,11)->nullable();
            $table->string('ILE',45)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('inv_transaction', function($table) {
            $table->foreign('business_id')->references('id')->on('business');
            $table->foreign('buyer_id')->references('id')->on('buyer');
            $table->foreign('grn_hd_id')->references('id')->on('inv_grn_head');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('store_id')->references('id')->on('store');
            $table->foreign('supplier_id')->references('id')->on('inv_supplier');
            $table->foreign('currency_id')->references('id')->on('currency');

        });






    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('inv_supplier');
        Schema::drop('inv_requisition_head');
        Schema::drop('inv_requisition_detail');
        Schema::drop('inv_purchase_order_head');
        Schema::drop('inv_purchase_order_detail');
        Schema::drop('inv_grn_head');
        Schema::drop('inv_grn_detail');
        Schema::drop('inv_transaction');

    }
}
