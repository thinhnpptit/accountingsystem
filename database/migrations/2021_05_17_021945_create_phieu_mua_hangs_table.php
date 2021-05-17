<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuMuaHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_mua_hangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phan_loai');
            $table->integer('so_luong');
            $table->float('thanh_tien');
            $table->date('ngay_mua');
            $table->integer('hoadon_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieu_mua_hangs');
    }
}
