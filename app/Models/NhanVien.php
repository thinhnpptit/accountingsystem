<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    //
    public function muahang()
    {
        return $this->hasMany(PhieuMuaHang::class);
    }
}
