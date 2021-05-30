<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuXuatKhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_xuat_khos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Date('ngay_xuat');
            $table->bigInteger('nhanvien_id');
            $table->integer('tong_hang');
            $table->string('ly_do');
            $table->string('nguoi_nhan');
            $table->double('tong_tien');
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
        Schema::dropIfExists('phieu_xuat_khos');
    }
}
