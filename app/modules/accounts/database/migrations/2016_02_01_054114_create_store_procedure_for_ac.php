<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStoreProcedureForAc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_voucher_post`(
        v_voucher_number VARCHAR(50),
        p_user VARCHAR(50)
        )
        BEGIN
            INSERT INTO balance(voucher_head_id, voucher_number,coa_id, account_code,sub_account_code,DATE,branch_id,reference,YEAR,period,currency_id,exchange_rate,prime_amount,base_amount,STATUS,created_at,created_by)
            SELECT a.id, a.voucher_number,b.coa_id, b.account_code,b.sub_account_code,a.date,a.branch_id,a.reference,a.year,a.period,b.currency_id,b.exchange_rate,b.prime_amount,b.base_amount,\'post\',CURRENT_TIMESTAMP,p_user
            FROM `entsol`.`ac_voucher_head` a
            INNER JOIN `entsol`.`ac_voucher_detail` b ON a.id=b.voucher_head_id
            WHERE a.status=\'balanced\' AND a.voucher_number=v_voucher_number;

            UPDATE `entsol`.`ac_voucher_head` SET STATUS=\'posted\' WHERE voucher_number=v_voucher_number AND STATUS=\'balanced\';
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
        $sql = "DROP PROCEDURE IF EXISTS sp_voucher_post";
        DB::connection()->getPdo()->exec($sql);
    }
}
