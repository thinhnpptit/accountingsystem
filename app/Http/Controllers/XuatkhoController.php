<?php

namespace App\Http\Controllers;

use App\Models\MatHang;
use App\Models\NhanVien;
use App\Models\HoaDonBanHang;
use App\Models\PhieuNhapKho;
use App\Models\PhieuXuatKho;
use Illuminate\Http\Request;

class XuatkhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banhangs = PhieuXuatKho::all();

        return view('xuatkho.index', compact('xuatkhos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mathangs = MatHang::all();
        $nhanvien = NhanVien::all();

        return view('xuatkho.create', compact('mathangs', 'nhanvien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $xuatkho = new PhieuXuatKho();
        $xuatkho->ngay_xuat = $request->ngay;
        $xuatkho->nhanvien_id = $request->nhanvien;
        $xuatkho->tong_hang = $request->tongso;
        $xuatkho->ly_do = $request->lydo;
        $xuatkho->tong_tien = $request->thanhtien;
        $xuatkho->save();
        for ($i=1; $i<6; $i++)
        {
            $id = 'maMH'.$i;
            $gia = 'gia'.$i;
            $so = 'value'.$i;
            if (isset($request->$id ))
            {
                $MH = MatHang::find($request->$id);
                $trongkho = $MH->so_luong_trong_kho - $request->$so;
                $MH->update([
                    'so_luong_trong_kho' => $trongkho]);
                $xuatkho->mathang()->attach($MH->id, ['so_luong' => $request->$so, 'don_gia' => $request->$gia]);
            }
        }

        return redirect()->route('xuatkho.create')->with('Add success');
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
