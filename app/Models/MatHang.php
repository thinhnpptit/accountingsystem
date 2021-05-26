<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatHang extends Model
{
    //
    public function muahang()
    {
        return $this->belongsToMany(PhieuMuaHang::class);
    }

    public function nhapkho()
    {
        return $this->belongsToMany(PhieuNhapKho::class)->withTimestamps();
    }
}
