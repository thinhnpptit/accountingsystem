<?php

namespace App\Http\Controllers;

use App\Models\HoaDonBanHang;
use App\Models\MatHang;
use App\Models\NhanVien;
use App\Models\Phieuthu;
use App\Models\PhieuMuaHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhieuthuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thu = Phieuthu::all();

        return view('thu.index', compact('thu'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nhanvien = NhanVien::all();
        $banhangs = HoaDonBanHang::all();

        return view('thu.create', compact('nhanvien', 'banhangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thu = new Phieuthu();
        $thu->nhan_vien_id = $request->nhanvien;
        $thu->ngay = $request->ngay;
        $thu->noi_dung = $request->lydo5;
        $thu->tong_thu = $request->thanhtien;
        $thu->save();

        for ($i=1; $i<6; $i++)
        {
            $id = 'maMH'.$i;
            $tien = 'tien'.$i;
            if (isset($request->$id ))
            {
                $MH = HoaDonBanHang::find($request->$id);
                $MH->update(['phieuthu_id' => $thu->id]);
                $thu->banhang()->attach($MH->id, ['so_tien' => $request->$tien]);
            } else{
                if($request->$tien > 0){
                    $thu->banhang()->attach(0, ['so_tien' => $request->$tien]);
                }
            }
        }

        return redirect(route('thu.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thu = Phieuthu::find($id);
        $khoanthu = DB::table('phieu_thu_ban_hang')
            ->where('phieuthu_id', '=', $id)
            ->get();

        return view('thu.show', compact('thu', 'khoanthu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
