<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuNhapKhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_nhap_khos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('ngay_nhap');
            $table->string('nha_cc');
            $table->integer('nhanvien_id');
            $table->float('tong_tien');
            $table->integer('so_luong');
            $table->string('don_vi');
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
        Schema::dropIfExists('phieu_nhap_khos');
    }
}
