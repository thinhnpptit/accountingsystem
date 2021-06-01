<?php

namespace App\Http\Controllers;

use App\Models\Luong;
use Illuminate\Http\Request;

class LuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $luong = Luong::all();

        return view('luong.index', compact('luong'));
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

        return view('luong.create', compact('phongban', 'vitri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $luong = new Luong();
        $luong->cong = $request->cong;
        $luong->luongcoban = $request->coban;
        $luong->thang = $request->thang . "/" . substr($request->ngaymua, 0, 4);
        $luong->tienthuong = $request->thuong;
        $luong->nhanvien_id = $request->nhanvien;
<<<<<<< HEAD
        $luong->tongluong =  round(($request->coban / 23) * $request->cong + $request->thuong);
        $luong->bhyt =  round($request->coban * 0.015);
        $luong->thuecanhan =  0.1 * round($request->luongcoban);
=======
        $luong->tongluong =  round(($request->coban/23)*$request->cong+$request->thuong);
        $luong->bhyt =  round($request->coban*0.015);
        $luong->thuecanhan =  0.1*$request->coban;
>>>>>>> main
        $luong->tongnhan =  round($luong->tongluong - $luong->bhyt - $luong->thuecanhan);
        $luong->trangthai = 'chưa thanh toán';
        $luong->save();

        return redirect(route('luong.index'));
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
        $luong = Luong::find($id);
        $luong->update(['trangthai' => 'Đã thanh toán']);

        return redirect(route('luong.index'));
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
