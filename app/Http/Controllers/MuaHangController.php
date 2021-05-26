<?php

namespace App\Http\Controllers;

use App\Models\PhieuMuaHang;
use Illuminate\Http\Request;

class MuaHangController extends Controller
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
        //
        return view('muahang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $phieumh = new PhieuMuaHang;
        $phieumh->phan_loai = $request->phanloai;
        // $phieumh->nha_cc = $request->nhacc;
        // $phieumh->tenMH = $request->tenMH;
        // $phieumh->dongia = $request->dongia;
        $phieumh->so_luong = $request->soluong;
        $phieumh->thanh_tien = $request->thanhtien;
        $phieumh->ngay_mua = $request->ngaymua;
        $phieumh->nhanvien_id = $request->nhanvien;
        // $phieumh->thanhtien =

        $phieumh->save();

        return redirect()->route('muahang.index')->with('Add success');
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
        return redirect()->route('muahang.index')->with(compact($message));
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

        return redirect()->route('muahang.index')->with('Delete successfully');
    }
}
