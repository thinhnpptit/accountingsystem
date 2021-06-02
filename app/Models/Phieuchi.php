<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phieuchi extends Model
{
    protected $fillable = ['nhan_vien_id',	'ngay',	'noi_dung',	'tong_chi'];
    protected $table = 'phieu_chi';

    public function muahang(){
        return $this->belongsToMany(PhieuMuaHang::class, 'phieu_chi_mua_hang','phieuchi_id', 'muahang_id')->withPivot('so_tien');
    }
}
