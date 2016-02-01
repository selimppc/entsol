<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerForAc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Trigger for Voucher_detail -> new Entry
        DB::unprepared('
        CREATE TRIGGER `tr_voucherdt_insert` AFTER INSERT ON `ac_voucher_detail`
                FOR EACH ROW BEGIN
                UPDATE ac_voucher_head AS a
                SET a.status=(SELECT CASE WHEN SUM(prime_amount)=0 THEN \'balanced\' ELSE \'suspend\' END
                 FROM ac_voucher_detail
                 WHERE voucher_number=new.voucher_number
                 GROUP BY voucher_number)
                WHERE voucher_number=new.voucher_number;
        END;
        ');

        //Trigger for Voucher_detail -> update Entry
        DB::unprepared('
        CREATE
            TRIGGER `tr_voucherdt_update` AFTER UPDATE ON `ac_voucher_detail`
            FOR EACH ROW BEGIN
            UPDATE ac_voucher_head AS a
            SET a.status=(SELECT CASE WHEN SUM(prime_amount)=0 THEN \'balanced\' ELSE \'suspend\' END
            FROM ac_voucher_detail
            WHERE voucher_number=new.voucher_number
            GROUP BY voucher_number)
            WHERE voucher_number=new.voucher_number;
        END;
        ');

        //Trigger for Voucher_detail -> delete Entry
        DB::unprepared('
        CREATE
            TRIGGER `tr_voucherdt_delete` AFTER DELETE ON `ac_voucher_detail`
            FOR EACH ROW BEGIN
            UPDATE ac_voucher_head AS a
            SET a.status=(SELECT CASE WHEN SUM(prime_amount)=0 THEN \'balanced\' ELSE \'suspend\' END
            FROM ac_voucher_detail
            WHERE voucher_number=old.voucher_number
            GROUP BY voucher_number)
            WHERE voucher_number=old.voucher_number;
        END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_voucherdt_insert`');
        DB::unprepared('DROP TRIGGER `tr_voucherdt_update`');
        DB::unprepared('DROP TRIGGER `tr_voucherdt_delete`');
    }
}
