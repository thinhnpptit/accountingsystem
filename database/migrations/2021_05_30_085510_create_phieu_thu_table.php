<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuThuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_thu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nhan_vien_id');
            $table->date('ngay');
            $table->string('noi_dung');
            $table->bigInteger('tong_thu');
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
        Schema::dropIfExists('phieu_thu');
    }
}
