<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TaiKhoan;
use Faker\Generator as Faker;

$factory->define(TaiKhoan::class, function (Faker $faker) {
    return [
        //
        'username' => $faker->unique()->userName,
        'password' => $faker->password($min = 6, $max = 20),
    ];
});
