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
        $mathang = new MatHang;

        $nhapkho->ngay_nhap = $request->ngaynhap;
        // $nhapkho->nha_cc = $request->nhacc;
        // $nhapkho->tenMH = $request->tenMH;
        // $nhapkho->dongia = $request->dongia;
        $nhapkho->nha_cc = $request->nhacc;
        $nhapkho->nhanvien_id = $request->nhanvien;
        $nhapkho->tong_tien = $request->tongtien;
        $nhapkho->so_luong = $request->soluong;
        $nhapkho->don_vi = $request->donvi;
        $mathang->tenMH = $request->tenMH;
        $mathang->don_gia = $request->dongia;

        $nhapkho->save();
        $mathang->save();

        $nhapkho1 = PhieuNhapKho::find($nhapkho->id);
        $nhapkho1->mathang()->attach($mathang->id);

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
    }
}
