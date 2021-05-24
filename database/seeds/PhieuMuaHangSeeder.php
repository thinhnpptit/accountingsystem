<?php

use App\Models\PhieuMuaHang;
use Illuminate\Database\Seeder;

class PhieuMuaHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(PhieuMuaHang::class, 20)->create();
    }
}
