<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBangLuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bang_luong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('luongcoban');
            $table->bigInteger('tongluong');
            $table->bigInteger('bhyt');
            $table->bigInteger('tongnhan');
            $table->bigInteger('nhanvien_id');
            $table->string('thang');
            $table->bigInteger('tienthuong');
            $table->bigInteger('thuecanhan');
            $table->string('trangthai');
            $table->integer('cong');
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
        Schema::dropIfExists('bang_luong');
    }
}
