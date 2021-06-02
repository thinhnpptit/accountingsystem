<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuThuBanHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_thu_ban_hang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('phieuthu_id');
            $table->bigInteger('banhang_id')->nullable();
            $table->bigInteger('so_tien');
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
        Schema::dropIfExists('phieu_thu_ban_hang');
    }
}
