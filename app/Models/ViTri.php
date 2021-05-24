<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViTri extends Model
{
    protected $fillable = [
        'chucvu',
        'phongban',
    ];

    public function nhanvien()
    {
        return $this->hasMany(NhanVien::class);
    }
}
