@extends('layouts.app')

@section('header')
    <title>Quản lý mặt hàng</title>
    <link rel="stylesheet" type="text/css" href="/core/css/datatable.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <style>
        div[v-cloak] {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="col-lg-12" v-cloak>
        <div class="block">
            <form name="form" id="newAccount" action="{{ route("mathang.store")}}" method="post">
                @csrf
                <div class="title"><strong>Thêm mặt hàng</strong></div>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="col-md-8 control-label" for="selectbasic">Tên mặt Hàng</label>
                                    <input class="form-control" type="text" id="tenMH" name="tenMH" value="{{ old('tenMH') }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-md-8 control-label" for="selectbasic">Nhà cung cấp</label>
                                    <input class="form-control" type="text" id="nhacc" name="nhacc" value="{{ old('nhacc') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Đơn giá</label>
                                    <input class="form-control" type="text" id="gia" name="gia" value="{{ old('gia') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Số Lượng</label>
                                    <input class="form-control" id="soluong" v-model=v1
                                           name="value1" value="{{ old('soluong')}}" placeholder="0"
                                           type="number" vueAttribute='v1'>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Đơn vị</label>
                                    <input class="form-control" type="text" id="donvi" name="donvi" value="{{ old('donvi') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-horizontal" id='through'>
                    <div class="form-group row" id='buttons'>
                        <div class="col-sm-12 ml-auto">
                            <button type="button" onclick="cancel()" class="btn btn-secondary">Hủy</button>
                            <button type="submit" class="btn btn-primary" name="btnadd" id="btnadd" onclick="save()">Thêm mới</button>
                        </div>
                    </div>
                </div>
            </form>
            <div v-show='mathangs && mathangs.length ' class="table-responsive">
                <br>
                <table id="Mathangs" class="display">
                    <thead>
                    <tr class="table-active">
                        <th class="">Mã Hàng</th>
                        <th>Tên Mặt hàng</th>
                        <th>Nhà cung cấp</th>
                        <th>Số lượng trong kho</th>
                        <th>Đơn vị</th>
                        <th>Đơn giá</th>
                        <th>Tổng nhập</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for='mathang in mathangs'>
                        <td class="">@{{mathang.id}}</td>
                        <td class="table-active">@{{mathang.tenMH}}</td>
                        <td class="">@{{mathang.nhaCC}}</td>
                        <td class="table-active">@{{mathang.so_luong_trong_kho}}</td>
                        <td class="">@{{mathang.don_vi_tinh}}</td>
                        <td class="table-active">@{{mathang.don_gia}}</td>
                        <td class="">@{{mathang.so_luong_nhap}}</td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footer')

    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js">
    </script>
    <script>
        $(document).ready( function () {
            options={
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            };
            VueApp.getMathangs('table#Mathangs', options);
        } );

        function cancel(){
            location.reload();
        }

        function showAll(){
            location.href="<?php echo e(route("mathang.index")); ?>"
        }

        function save() {
            location.href=" <?php echo e(route("mathang.store")); ?> "
        }

    </script>
@endsection
