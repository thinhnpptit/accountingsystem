<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NhanVien;
use App\Models\TaiKhoan;
use App\Models\ViTri;
use Faker\Generator as Faker;

$factory->define(NhanVien::class, function (Faker $faker) {
    return [
        //
        'tenNV' => $faker->name($gender = null),
        'email' => $faker->unique()->freeEmail,
        'sdt' => $faker->e164PhoneNumber,
        'taikhoan_id' => TaiKhoan::all()->random()->id,
        'vitri_id' => ViTri::all()->random()->id,
    ];
});
