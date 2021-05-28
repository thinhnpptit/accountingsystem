<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNhanviensAndDeleteSoLuongToPhieuMuaHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phieu_mua_hangs', function (Blueprint $table) {
            $table->bigInteger('nhanvien_id');
            $table->dropColumn('so_luong');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phieu_mua_hangs', function (Blueprint $table) {
            //
        });
    }
}
