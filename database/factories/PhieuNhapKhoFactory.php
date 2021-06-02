<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\PhieuNhapKho;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(PhieuNhapKho::class, function (Faker $faker) {
    $array = ['kg', 'chiếc'];
    return [
        //
        'ngay_nhap' => $faker->dateTime($max = 'now', $timezone = null),
        'nha_cc' => $faker->numerify('Nha cung cap ##'),
        'nhanvien_id' => $faker->numberBetween($min = 1, $max = 10),
        'tong_tien' => $faker->randomFloat($nbMaxDicimals = NULL, $min = 1, $max = 1263),
        // 'so_luong' => $faker->numberBetween($min = 1, $max = 50),
        // 'don_vi' => Arr::random($array)
    ];
});
