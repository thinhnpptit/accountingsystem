<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MatHang;
use App\Models\MuaHangMatHang;
use App\Models\PhieuMuaHang;
use Faker\Generator as Faker;

$factory->define(MuaHangMatHang::class, function (Faker $faker) {
    return [
        //
        'mathang_id' => MatHang::all()->random()->id,
        'so_luong' => $faker->numberBetween($min = 1, $max = 50),
        'phieumuahang_id' => PhieuMuaHang::all()->random()->id,
    ];
});
