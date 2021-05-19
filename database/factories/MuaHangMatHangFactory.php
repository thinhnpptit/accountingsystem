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
        'phieumuahang_id' => PhieuMuaHang::all()->random()->id,
    ];
});
