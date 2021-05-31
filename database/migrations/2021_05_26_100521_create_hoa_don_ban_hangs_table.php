<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonBanHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_ban_hangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bang_mathang');
            $table->bigInteger('nhanvien_id');
            $table->bigInteger('thanhtien');
            $table->date('ngay_mua');
            $table->string('khachhang');
            $table->bigInteger('phieuthu_id');
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
        Schema::dropIfExists('phieu_ban_hangs');
    }
}
