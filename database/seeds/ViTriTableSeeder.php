<?php

use App\Models\ViTri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ViTriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array('Kế toán', 'Bán Hàng', 'Hành chính');
        $array1 = array(
            array('Kế toán thuế', 'Kế toán kho', 'Kế toán quỹ', 'Kế toán tiền lương'),
            array('Nhân viên bán hàng', 'Nhân viên quản lý bán hàng', 'giám sát bán hàng', 'Trưởng phòng bán hàng'),
            array('Giám đốc', 'Thư kí hành chính', 'Nhân viên bảo vệ', 'Trợ lý nhân sự'),
        );
            for($i=0; $i<3; $i++) {
            $ban = $array[$i];
            for($j=0; $j<4; $j++){
                $cvu = $array1[$i][$j];
                DB::table('vi_tris')->insert([
                    'chucvu' => $cvu,
                    'phongban' => $ban,
                ]);
            }

        }
    }
}
