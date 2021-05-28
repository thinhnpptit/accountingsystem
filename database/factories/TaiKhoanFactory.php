<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TaiKhoan;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(TaiKhoan::class, function (Faker $faker) {
    return [
        //
        'username' => $faker->unique()->userName,
        'password' => Hash::make(12345678),
    ];
});
