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
        //
        $nhapkho = new PhieuNhapKho;
        $mathangs = array();
        $tenMHs = array();
        $dongias = array();
        $soluongs = array();
        $donvis = array();

        $nhapkho->ngay_nhap = $request->ngaynhap;
        $nhapkho->nha_cc = $request->nhacc;
        $nhapkho->nhanvien_id = $request->nhanvien;
        $nhapkho->tong_tien = $request->tongtien;
        foreach ($request->tenMH as $k3 => $v3) {
            array_push($tenMHs, $request->tenMH[$k3]);
        }
        foreach ($request->dongia as $k4 => $v4) {
            array_push($dongias, $request->dongia[$k4]);
        }
        $nhapkho->save();
        $nhapkho1 = PhieuNhapKho::find($nhapkho->id);
        for ($i = 0; $i < count($tenMHs); $i++) {
            array_push($mathangs, new MatHang(['tenMH' => $tenMHs[$i], 'don_gia' => $dongias[$i]]));
        }
        foreach ($request->soluong as $k1 => $v1) {
            // $nhapkho1->mathang->pivot->so_luong = $request->soluong[$k1];
            array_push($soluongs, $v1);
        }
        foreach ($request->donvi as $k2 => $v2) {
            array_push($donvis, $v2);
        }
        for ($i = 0; $i < count($mathangs); $i++) {
            $mh1 = new MatHang(['tenMH' => $mathangs[$i]->tenMH, 'don_gia' => $mathangs[$i]->don_gia]);
            $mh1->save();
            $nhapkho1->mathang()->attach($mh1->id, ['so_luong' => $soluongs[$i], 'don_vi' => $donvis[$i]]);
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
