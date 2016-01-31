<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDumpAcSqlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(file_get_contents("app/modules/accounts/database/sql_dump/ac_group_one.sql"));
        DB::unprepared(file_get_contents("app/modules/accounts/database/sql_dump/cm_branch.sql"));
        DB::unprepared(file_get_contents("app/modules/accounts/database/sql_dump/cm_currency.sql"));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
