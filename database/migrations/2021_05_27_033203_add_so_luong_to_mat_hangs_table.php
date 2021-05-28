<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoLuongToMatHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mat_hangs', function (Blueprint $table) {
            $table->integer('so_luong_trong_kho')->default(0);
            // $table->integer('so_luong_nhap');
            $table->integer('so_luong_uoc_tinh')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mat_hangs', function (Blueprint $table) {
            //
        });
    }
}
