<?php

use App\Models\ViTri;
use Illuminate\Database\Seeder;

class ViTriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(ViTri::class, 20)->create();
    }
}
