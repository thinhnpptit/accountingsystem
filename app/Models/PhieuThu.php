<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuThu extends Model
{
    protected $fillable = ['nhan_vien_id',	'ngay',	'noi_dung',	'tong_thu'];
    protected $table = 'phieu_thu';

    public function banhang(){
        return $this->belongsToMany(HoaDonBanHang::class, 'phieu_thu_ban_hang', 'phieuthu_id','banhang_id')->withPivot('so_tien');
    }
}
