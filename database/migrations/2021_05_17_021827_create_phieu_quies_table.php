<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuQuiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_quies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nhanvien_id');
            $table->date('ngay');
            $table->text('noi_dung');
            $table->float('so_tien_thu');
            $table->float('so_tien_chi');
            $table->integer('nguoi_nop');
            $table->integer('nguoi_chi');
            $table->integer('discriminator');
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
        Schema::dropIfExists('phieu_quies');
    }
}
