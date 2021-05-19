<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuaHangMatHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mua_hang_mat_hangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mathang_id');
            $table->integer('phieumuahang_id');
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
        Schema::dropIfExists('mua_hang_mat_hangs');
    }
}
