<?php

use App\Models\MatHang;
use Illuminate\Database\Seeder;

class MatHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(MatHang::class, 20)->create();
    }
}
