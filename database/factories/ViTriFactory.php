<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ViTri;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(ViTri::class, function (Faker $faker) {
    $array = array('Kế toán thuế', 'Kế toán kho', 'Kế toán bán hàng', 'Kế toán quỹ');

    return [
        //
        'chucvu' => Arr::random($array),
        'phongban' => $faker->randomElement($array2 = array('Tài chính', 'Kế toán')),
    ];
});
