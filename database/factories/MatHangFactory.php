<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MatHang;
use Faker\Generator as Faker;

$factory->define(MatHang::class, function (Faker $faker) {
    return [
        //
        'tenMH' => $faker->numerify('Mat hang ##'),
        'don_gia' => $faker->randomFloat($nb = null, $min = 1, $max = 1260),
        'nhaCC' => $faker->numerify('Nha cung cap ##'),
    ];
});
