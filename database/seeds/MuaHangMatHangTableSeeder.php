<?php

use App\Models\MuaHangMatHang;
use Illuminate\Database\Seeder;

class MuaHangMatHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(MuaHangMatHang::class, 20)->create();
    }
}
