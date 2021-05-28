<?php

namespace App\Observers;

use App\PhieuMuaHang;

class MuahangObserver
{
    /**
     * Handle the phieu mua hang "created" event.
     *
     * @param  \App\Models\PhieuMuaHang  $phieuMuaHang
     * @return void
     */
    public function created(PhieuMuaHang $phieuMuaHang)
    {

    }

    /**
     * Handle the phieu mua hang "updated" event.
     *
     * @param  \App\Models\PhieuMuaHang  $phieuMuaHang
     * @return void
     */
    public function updated(PhieuMuaHang $phieuMuaHang)
    {
        //
    }

    /**
     * Handle the phieu mua hang "deleted" event.
     *
     * @param  \App\PhieuMuaHang  $phieuMuaHang
     * @return void
     */
    public function deleted(PhieuMuaHang $phieuMuaHang)
    {
        //
    }

    /**
     * Handle the phieu mua hang "restored" event.
     *
     * @param  \App\PhieuMuaHang  $phieuMuaHang
     * @return void
     */
    public function restored(PhieuMuaHang $phieuMuaHang)
    {
        //
    }

    /**
     * Handle the phieu mua hang "force deleted" event.
     *
     * @param  \App\PhieuMuaHang  $phieuMuaHang
     * @return void
     */
    public function forceDeleted(PhieuMuaHang $phieuMuaHang)
    {
        //
    }
}
