<?php

namespace App\Http\Controllers;

use App\Models\MatHang;
use App\Models\PhieuNhapKho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NhapKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nhapkho = PhieuNhapKho::all();


        return view('nhapkho.index', compact('nhapkho'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nhapkho.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhapkho = new PhieuNhapKho;
        $tenMHs = $request->tenMH;
        $dongias = $request->dongia;
        $soluongs = $request->soluong;
        $donvis = $request->donvi;

        $nhapkho->ngay_nhap = $request->ngaynhap;
        $nhapkho->nha_cc = $request->nhacc;
        $nhapkho->nhanvien_id = $request->nhanvien;
        $nhapkho->tong_tien = $request->tongtien;
        $nhapkho->save();

        for ($i = 0; $i < count($tenMHs); $i++) {
            $isMathang = MatHang::where('tenMH', '=', $tenMHs[$i])->first();
            $mh = new MatHang();
            $mh->tenMH = $tenMHs[$i];
            $mh->nhaCC = $request->nhacc;
            $mh->don_gia = $dongias[$i];
            $mh->don_vi_tinh = $donvis[$i];
            $mh->so_luong_trong_kho = $soluongs[$i];
            $mh->so_luong_nhap = $soluongs[$i];
            $mh->so_luong_uoc_tinh = 0;

            if ($isMathang != null) {
                $isMathang->update(array(
                    'nhaCC' => $request->nhacc,
                    'so_luong_trong_kho' => $isMathang->so_luong_trong_kho + $soluongs[$i],
                    'so_luong_nhap' => $isMathang->so_luong_nhap + $soluongs[$i],
                ));
                $nhapkho->mathang()->attach($isMathang->id, ['so_luong_nhap' => $soluongs[$i]]);
            } else {
                $mh->save();
                $nhapkho->mathang()->attach($mh->id, ['so_luong_nhap' => $soluongs[$i]]);

            }
        }

        return redirect()->route('nhapkho.index')->with('Add success');
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
        $nhapkho = PhieuNhapKho::find($id);
        $nhapkho->delete();

        return redirect()->route('nhapkho.index')->with('Delete successfully');
    }
}
