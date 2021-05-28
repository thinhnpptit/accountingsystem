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

    public function nhanvien()
    {
        return $this->belongsTo(NhanVien::class);
    }

    public function mathang()
    {
        return $this->belongsToMany(MatHang::class);
    }
}
