<?php

use App\Account;
use App\Subaccount;
use App\Chartaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(
    ['middleware' => ['auth']],
    function () {

        Route::get(
            '/',
            function () {
                return redirect()->route('muahang.create');
            }
        );

        Route::get(
            '/home',
            function () {
                return redirect()->route('muahang.create');
            }
        );

        foreach (['muahang', 'receipt', 'adjustment', 'banhang'] as $resource) {
            $prefix = Str::plural($resource);
            $controller = ucfirst($resource) . 'Controller';
            Route::resource($prefix, $controller)->except(['edit', 'update', 'destroy']);
        }
        Route::resource('/muahang', 'MuahangController');
        Route::resource('/banhang', 'BanhangController');
        Route::resource('invoices', 'InvoiceController');

        Route::resource('ledger', 'Ledger');
        Route::get('/invoice/supplier_create', 'InvoiceController@supplier_create')->name('SupplierI');



        foreach (['account', 'chartaccount', 'subaccount'] as $resource) {
            $prefix = Str::plural($resource);
            $controller = ucfirst($resource) . 'Controller';
            Route::resource($prefix, $controller)->except(['show']);
        }

        Route::get(
            '/general',
            function () {
                return view('underConstruction');
            }
        )->name('general_ledger');
    }
);

Route::middleware('auth')->prefix('api/')->group(
    function () {

        Route::get(
            'chartaccounts',
            function (Request $request) {
                $chartaccounts = Chartaccount::all();
                return compact('chartaccounts');
            }
        );

        Route::get(
            'accounts',
            function (Request $request) {
                $accounts = Account::with('chart')->get();
                return compact('accounts');
            }
        );

        Route::get(
            'mathangs',
            function (Request $request) {
                $mathangs = \App\Models\MatHang::all();
                return compact('mathangs');
            }
        );

        Route::get(
            'subaccounts',
            function (Request $request) {
                $subaccounts = Subaccount::with('mainaccount')->get();
                return compact('subaccounts');
            }
        );

        Route::get(
            'accountsOfChart',
            function (Request $request) {
                $chart_id = request()->input('chart_id');
                $accounts = Account::where('chartid', '=', $chart_id)->get();
                return compact('accounts');
            }
        )->name('accountsOfChart');

        Route::get(
            'subaccountsOfAccount',
            function (Request $request) {
                $account_id = request('account_id');
                Log::debug($account_id);
                $account = Account::find($account_id);
                if ($account) {
                    $subaccounts = $account->subaccounts;
                } else {
                    $subaccounts = [];
                }
                return compact('account_id', 'account', 'subaccounts');
            }
        )->name('subaccountsOfAccount');

        Route::get(
            'nhanvienTheovitri',
            function (Request $request) {
                $vitri_id = request('vitri_id');
                Log::debug($vitri_id);
                $nv = \App\Models\NhanVien::all()->groupBy('vitri_id');
                if ($nv) {
                    $nhanvien = $nv->get($vitri_id);
                } else {
                    $nhanvien = [];
                }
                return compact('vitri_id', 'nhanvien');
            }
        )->name('nhanvienTheovitri');

        Route::get(
            'vitriTheoPhongban',
            function (Request $request) {
                $phongban = request('phongban');
                Log::debug($phongban);
                $vitri = \App\Models\ViTri::all()->groupBy('phongban');
                if ($vitri) {
                    $chucvu = $vitri->get($phongban);
                } else {
                    $chucvu = [];
                }
                return compact('phongban', 'chucvu');
            }
        )->name('vitriTheoPhongban');

        Route::get(
            'mhInfo',
            function (Request $request) {
                $ma = request('ma');
                Log::debug($ma);
                $mh = \App\Models\MatHang::all()->groupBy('id');
                if ($mh) {
                    $mhh = $mh->get($ma);
                } else {
                    return 0;
                }
                return compact('mhh');
            }
        )->name('mhInfo');

    }
);

Route::any(
    'core/{uri}',
    function ($uri) {
        serve_core($uri);
    }
);

Route::fallback(
    function () {
        return 'I am sorry - I cant find ' . request()->getRequestUri();
    }
);


// Verb        Path                            Action  Route Name
// -------------------------------------------------------------------
// GET         /resource                       index   resource.index
// GET         /resource/create                create  resource.create
// POST        /resource                       store   resource.store
// GET         /resource/{resource}            show    resource.show
// GET         /resource/{resource}/edit       edit    resource.edit
// PUT/PATCH   /resource/{resource}            update  resource.update
// DELETE      /resource/{resource}            destroy resource.destroy
