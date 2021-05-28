<?php

namespace App\Http\Controllers;

use App\Models\MatHang;
use App\Models\NhanVien;
use App\Models\HoaDonBanHang;
use Illuminate\Http\Request;

class BanhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banhangs = HoaDonBanHang::all();

        return view('banhang.index', compact('banhangs'));
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

        return view('banhang.create', compact('mathangs', 'nhanvien'));
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
        for ($i=1; $i<6; $i++)
        {
            $id = 'maMH'.$i;
            $gia = 'gia'.$i;
            $so = 'value'.$i;
            if (isset($request->$id ))
            {
                $MH = array();
                for ($j=1; $j<5; $j++)
                {
                    $MH = array('id:'.$request->$id,
                        'dongia:'.$request->$gia,
                        'soluong:'.$request->$so);
                }
                $bangMH[$i] = implode(',',$MH);
            }
        }
        $phieuban = new HoaDonBanHang();
        $phieuban->nhanvien_id = $request->nhanvien;
        $phieuban->khachhang = $request->khachhang;
        $phieuban->ngay_mua = $request->ngay;
        $phieuban->thanhtien = $request->thanhtien;
        $phieuban->phieuthu_id = '0';
        $phieuban->bang_mathang = implode(';',$bangMH);
        $phieuban->save();

        return redirect()->route('banhang.index')->with('Add success');
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
