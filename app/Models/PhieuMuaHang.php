<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuMuaHang extends Model
{
    //
    protected $fillable = [
        'phanloai',
        'soluong',
        'thanhtien',
        'ngaymua',
    ];

    public function nhanvien()
    {
        return $this->belongsTo(NhanVien::class);
    }
}
