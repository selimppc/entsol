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
            //$table->unsignedInteger('yarn_lot_id')->nullable();
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
            //$table->foreign('yarn_lot_id')->references('id')->on('yarn_lot');
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

        /*transfer_head*/

        Schema::create('transfer_head', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id')->nullable();
            $table->string('transfer_no',45)->nullable();
            $table->unsignedInteger('to_store_id')->nullable();
            $table->unsignedInteger('from_store_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->dateTime('date',64)->nullable();
            $table->dateTime('confirm_date',64)->nullable();
            $table->text('note',256)->nullable();
            $table->string('transfer_category',64)->nullable();
            $table->string('transfer_type',64)->nullable();
            $table->string('chalan_no',45)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('transfer_head', function($table) {
            $table->foreign('business_id')->references('id')->on('business');
            $table->foreign('to_store_id')->references('id')->on('store');
            $table->foreign('from_store_id')->references('id')->on('store');
            if(Schema::hasTable('company'))
            {
                $table->foreign('company_id')->references('id')->on('company');
            }

        });

        /*transfer_detail*/

        Schema::create('transfer_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transfer_hd_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('store_id')->nullable();
            $table->string('unit',8)->nullable();
            $table->unsignedInteger('qty')->nullable();
            $table->float('price',8,2)->nullable();
            $table->float('transfer_value',8,2)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('transfer_detail', function($table) {
            $table->foreign('transfer_hd_id')->references('id')->on('transfer_head');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('store_id')->references('id')->on('store');
        });


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


        /*adjustment_detail*/

        Schema::create('adjustment_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('adj_hd_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->string('batch_number',45)->nullable();
            $table->dateTime('expiry_date',64)->nullable();
            $table->unsignedInteger('qty')->nullable();
            $table->text('stock_note',256)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adjustment_detail', function($table) {
            $table->foreign('adj_hd_id')->references('id')->on('adjustment_head');
            $table->foreign('product_id')->references('id')->on('product');
        });


        /*return_head*/

        Schema::create('return_head', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('grn_hd_id')->nullable();
            $table->unsignedInteger('business_id')->nullable();
            $table->unsignedInteger('return_from_store')->nullable();
            $table->unsignedInteger('return_to_store')->nullable();
            $table->string('return_category',64)->nullable();
            $table->enum('return_type',array(''))->nullable();
            $table->dateTime('return_date',64)->nullable();
            $table->string('return_no',45)->nullable();
            $table->string('challan_no',45)->nullable();
            $table->text('note',256)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('return_head', function($table) {
            $table->foreign('business_id')->references('id')->on('business');
            $table->foreign('grn_hd_id')->references('id')->on('inv_grn_head');
            $table->foreign('return_from_store')->references('id')->on('store');
            $table->foreign('return_to_store')->references('id')->on('store');
        });


        /*return_detail*/

        Schema::create('return_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('return_hd_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->float('return_qty',8,2)->nullable();
            $table->float('rate',8,2)->nullable();
            $table->double('amount',16,2)->nullable();
            $table->integer('buyer_order_id',false,11)->nullable();
            $table->float('current_stock',8,2)->nullable();
            $table->string('unit',8)->nullable();
            $table->float('avg_return_value',8,2)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('return_detail', function($table) {
            $table->foreign('return_hd_id')->references('id')->on('return_head');
            $table->foreign('product_id')->references('id')->on('product');
        });


        /*issue_head*/

        Schema::create('issue_head', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id')->nullable();
            $table->string('issue_no',45)->nullable();
            $table->dateTime('issue_date',64)->nullable();
            $table->enum('source',array(''))->nullable();
            $table->unsignedInteger('from_store_id')->nullable();
            $table->unsignedInteger('to_store_id')->nullable();
            $table->string('challan_no',45)->nullable();
            $table->unsignedInteger('buyer_id')->nullable();
            $table->integer('buyer_order_id',false,11)->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->text('note',256)->nullable();
            $table->integer('item_category',false,11)->nullable();
            $table->string('item_garment_color',45)->nullable();
            $table->string('dying_batch_number',45)->nullable();
            $table->string('dying_lap_dip_no',45)->nullable();
            $table->text('fabric_description',256)->nullable();
            $table->integer('knitting_dying_program_id',false,11)->nullable();
            $table->integer('knitting_dying_business_id',false,11)->nullable();
            $table->float('gray_fabric_required',8,2)->nullable();
            $table->dateTime('confirm_date',64)->nullable();
            $table->decimal('exchange_rate',20,6)->nullable();
            $table->integer('to_currency_id',false,11)->nullable();
            $table->integer('to_exchange_rate',false,11)->nullable();
            $table->enum('status',array('active','cancel','approved'))->nullable();
            $table->float('tax_rate',8,2)->nullable();
            $table->double('tax_amount',16,2)->nullable();
            $table->float('discount_rate',8,2)->nullable();
            $table->double('discount_amount',16,2)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('issue_head', function($table) {
            $table->foreign('business_id')->references('id')->on('business');
            $table->foreign('from_store_id')->references('id')->on('store');
            $table->foreign('to_store_id')->references('id')->on('store');
            $table->foreign('buyer_id')->references('id')->on('buyer');
            $table->foreign('supplier_id')->references('id')->on('inv_supplier');
            $table->foreign('currency_id')->references('id')->on('currency');
        });


        /*issue_detail*/

        Schema::create('issue_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('issue_head_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->string('yarn_lot_no',45)->nullable();
            $table->unsignedInteger('yarn_count_id')->nullable();
            $table->unsignedInteger('yarn_composition_id')->nullable();
            $table->unsignedInteger('yarn_type_id')->nullable();
            $table->unsignedInteger('yarn_color_id')->nullable();
            $table->unsignedInteger('product_brand_id')->nullable();
            $table->float('required_qty',8,2)->nullable();
            $table->float('total_issued_qty',8,2)->nullable();
            $table->string('unit',45)->nullable();
            $table->double('base_amount',16,2)->nullable();
            $table->double('prime_amount',16,2)->nullable();
            $table->float('tax_rate',8,2)->nullable();
            $table->double('tax_amount',16,2)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('issue_detail', function($table) {
            $table->foreign('issue_head_id')->references('id')->on('issue_head');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('yarn_count_id')->references('id')->on('yarn_count');
            $table->foreign('yarn_type_id')->references('id')->on('yarn_type');
            $table->foreign('yarn_composition_id')->references('id')->on('yarn_composition');
            $table->foreign('yarn_color_id')->references('id')->on('yarn_color');
            $table->foreign('product_brand_id')->references('id')->on('product_brand');
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
        Schema::drop('transfer_head');
        Schema::drop('transfer_detail');
        Schema::drop('adjustment_head');
        Schema::drop('adjustment_detail');
        Schema::drop('return_head');
        Schema::drop('return_detail');
        Schema::drop('issue_head');
        Schema::drop('issue_detail');


    }
}
