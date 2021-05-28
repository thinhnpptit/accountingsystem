<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
<<<<<<< HEAD
    //
    public function muahang()
    {
        return $this->hasMany(PhieuMuaHang::class);
=======
    protected $fillable = [
        'tenNV',
        'sdt',
        'taikhoan_id',
        'vitri_id',
        'email',
        ];

    public function vitri() {
        return $this->belongsTo(ViTri::class);
>>>>>>> upstream/main
    }
}
