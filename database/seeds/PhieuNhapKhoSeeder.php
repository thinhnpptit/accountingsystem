<?php

use App\Models\PhieuNhapKho;
use Illuminate\Database\Seeder;

class PhieuNhapKhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(PhieuNhapKho::class, 5)->create();
    }
}
