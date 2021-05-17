<?php

use App\Models\NhanVien;
use Illuminate\Database\Seeder;

class NhanVienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(NhanVien::class, 20)->create();
    }
}
