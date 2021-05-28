<?php

namespace App\Http\Controllers;

use App\Models\MatHang;
use App\Models\NhanVien;
use App\Models\PhieuMuaHang;
use Illuminate\Http\Request;

class MuahangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $muahang = PhieuMuaHang::all();

        return view('muahang.index', compact('muahang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phongban =  \App\Models\ViTri::all()->groupBy('phongban')->keys();
        $vitri = \App\Models\ViTri::all()->groupBy('phongban');
        $mathang = MatHang::all();

        return view('muahang.create', compact('phongban', 'vitri', 'mathang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bangMH = array();
        for ($i = 1; $i < 6; $i++) {
            $ten = 'tenMH' . $i;
            $cc = 'nhaCC' . $i;
            $gia = 'dongia' . $i;
            $so = 'soluong' . $i;
            if (isset($request->$ten)) {
                $MH = array();
                for ($j = 1; $j < 5; $j++) {
                    $MH = array(
                        'tenMH' . ':' . $request->$ten,
                        'nhaCC' . ':' . $request->$cc,
                        'dongia' . ':' . $request->$gia,
                        'soluong' . ':' . $request->$so
                    );
                }
                $bangMH[$i] = implode(',', $MH);
            }
        }
        $phieumh = new PhieuMuaHang;
        $phieumh->phan_loai = $request->phanloai;
        $phieumh->thanh_tien = $request->thanhtien;
        $phieumh->ngay_mua = $request->ngaymua;
        $phieumh->hoadon_id = "0";
        $phieumh->nhanvien_id = $request->nhanvien;
        $phieumh->bang_mathang = implode(';', $bangMH);
        $phieumh->save();

        return redirect()->route('muahangs.index')->with('Add success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $muahang = PhieuMuaHang::find($id);


        return view('muahang.show', compact('muahang'));
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
        $muahang = PhieuMuaHang::find($id);

        return view('muahang.edit', compact('muahang'));
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
        $phieumh = PhieuMuaHang::find($id);
        $phieumh->phan_loai = $request->phanloai;
        // $phieumh->nha_cc = $request->nhacc;
        $phieumh->so_luong = $request->soluong;
        $phieumh->thanh_tien = $request->thanhtien;
        $phieumh->ngay_mua = $request->ngaymua;

        $phieumh->save();

        $message = "Phiếu mua hàng với id = " . $phieumh->id . " được cập nhật thành công";
        return redirect()->route('muahangs.index')->with(compact($message));
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
        $muahang = PhieuMuaHang::find($id);
        $muahang->delete();

        return redirect()->route('muahangs.index')->with('Delete successfully');
    }
}
