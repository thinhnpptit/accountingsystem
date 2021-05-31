<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDonBanHang extends Model
{
    protected $fillable = ['phieuthu_id'];

    public function thu()
    {
        return $this->belongsToMany(Phieuthu::class)->withTimestamps()->withPivot('so_tien');
    }
}
