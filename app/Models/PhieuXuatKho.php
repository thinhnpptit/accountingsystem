<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuXuatKho extends Model
{
    public function mathang()
    {
        return $this->belongsToMany(MatHang::class, 'mat_hang_phieu_xuat_kho', 'phieu_xuat_kho_id', 'mat_hang_id');
    }
}
