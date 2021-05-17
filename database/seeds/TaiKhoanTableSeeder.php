<?php

use App\Models\TaiKhoan;
use Illuminate\Database\Seeder;

class TaiKhoanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(TaiKhoan::class, 20)->create();
    }
}
