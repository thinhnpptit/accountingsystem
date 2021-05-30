<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatHang extends Model
{
    //
    protected $fillable = ['tenMH', 'don_gia', 'don_vi_tinh', 'nhaCC', 'so_luong_trong_kho', 'so_luong_nhap', 'so_luong_uoc_tinh'];

    public function muahang()
    {
        return $this->belongsToMany(PhieuMuaHang::class);
    }

    public function nhapkho()
    {
        return $this->belongsToMany(PhieuNhapKho::class)->withTimestamps()->withPivot('so_luong');
    }

    public function xuatkho()
    {
        return $this->belongsToMany(PhieuXuatKho::class)->withTimestamps()->withPivot('so_luong', 'don_gia');
    }
}
