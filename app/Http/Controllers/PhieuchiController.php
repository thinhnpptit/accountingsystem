<?php

namespace App\Http\Controllers;

use App\Models\MatHang;
use App\Models\NhanVien;
use App\Models\Phieuchi;
use App\Models\PhieuMuaHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhieuchiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chi = Phieuchi::all();

        return view('chi.index', compact('chi'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nhanvien = NhanVien::all();
        $muahangs = PhieuMuaHang::all();

        return view('chi.create', compact('nhanvien', 'muahangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chi = new Phieuchi();
        $chi->nhan_vien_id = $request->nhanvien;
        $chi->ngay = $request->ngay;
        $chi->noi_dung = $request->lydo5;
        $chi->tong_chi = $request->thanhtien;
        $chi->save();

        for ($i=1; $i<6; $i++)
        {
            $id = 'maMH'.$i;
            $tien = 'tien'.$i;
            if (isset($request->$id ))
            {
                $MH = PhieuMuaHang::find($request->$id);
                $MH->update(['hoadon_id' => $chi->id]);
                $chi->muahang()->attach($MH->id, ['so_tien' => $request->$tien]);
            } else{
                if($request->$tien > 0){
                    $chi->muahang()->attach(0, ['so_tien' => $request->$tien]);
                }
            }
        }

        return redirect(route('chi.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chi = Phieuchi::find($id);
        $khoanchi = DB::table('phieu_chi_mua_hang')
            ->where('phieuchi_id', '=', $id)
            ->get();

        return view('chi.show', compact('chi', 'khoanchi'));
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
