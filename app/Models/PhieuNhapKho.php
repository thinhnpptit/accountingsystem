<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuNhapKho extends Model
{
    //
    public function mathang()
    {
        return $this->belongsToMany(MatHang::class, 'mat_hang_nhap_kho', 'nhap_kho_id', 'mat_hang_id')->withPivot('so_luong_nhap');
    }
}
