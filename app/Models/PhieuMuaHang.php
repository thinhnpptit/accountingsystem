<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuMuaHang extends Model
{
    //
    protected $fillable = [
        'phanloai',
        'thanhtien',
        'ngaymua',
        'nhanvien_id',
    ];
}
