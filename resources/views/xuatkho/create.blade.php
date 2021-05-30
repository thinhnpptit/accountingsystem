@extends('layouts.app')

@section('header')
    <title>Phiếu xuất kho</title>
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
            <form name="form" id="newAccount" action="{{ route("xuatkho.store")}}" method="post">
                @csrf
                <div class="title"><strong>Tạo phiếu xuất kho</strong></div>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-12 control-label" for="selectbasic" class="form-control">Người nhận</label>
                                    <select class=" form-control" id="nhanvien" name="nhanvien" v-model='newChartid'>
                                        <option value='null' disabled>Chọn nhân viên</option>
                                        @foreach ($nhanvien as $nv)
                                            <option value="{{ $nv->id }}">{{ $nv->tenNV }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-6 control-label" for="selectbasic"
                                           class="form-control">Ngày Tạo</label>
                                    <input type="date" id="datevalue" name="ngay" class="form-control"
                                           value="{{ old('datevalue') ?? "2018-00-00 " }}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-md-8 control-label" for="selectbasic">STT</label>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-8 control-label" for="selectbasic">Mã Hàng</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Tên mặt Hàng</label>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-8 control-label" for="selectbasic">Đơn giá</label>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-8 control-label" for="selectbasic">Đơn vị</label>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-8 control-label" for="selectbasic">Số Lượng</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id='line1'>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-md-8 control-label" for="selectbasic" >1</label>
                                </div>
                                <div class="col-md-2">
                                    <select id="maMH1" name="maMH1" value="{{ old('maMH1')}}"
                                            onchange="mathangChanged()" class="form-control">
                                        <option value>Chọn Mã mặt hàng</option>

                                        @foreach ($mathangs as $mh)
                                            <option value="{{ $mh->id }}">{{ $mh->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" id="tenMH1" name="tenMH1" value="{{ old('gia1') }}">
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" id="gia1" name="gia1" value="{{ old('gia1') }}">
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" id="donvi1" name="donvi1" value="{{ old('donvi1') }}">
                                </div>
                                <div class="col-md-2">
                                    <input class="col-md-8 form-control" id="soluong1" v-model=v1
                                        name="value1" value="{{ old('soluong1')}}" placeholder="0"
                                           type="number" vueAttribute='v1'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id='line2'>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-1">
                                <label class="col-md-8 control-label" for="selectbasic" >2</label>
                            </div>
                            <div class="col-md-2">
                                <select id="maMH2" name="maMH2" value="{{ old('maMH2')}}"
                                        onchange="mathang2Changed()" class="form-control">
                                    <option value>Chọn Mã mặt hàng</option>

                                    @foreach ($mathangs as $mh)
                                        <option value="{{ $mh->id }}">{{ $mh->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="text" id="tenMH2" name="tenMH2" value="{{ old('tenMH2') }}">
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="text" id="gia2" name="gia2" value="{{ old('gia2') }}">
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="text" id="donvi2" name="donvi2" value="{{ old('donvi2') }}">
                            </div>
                            <div class="col-md-2">
                                <input class="col-md-8 form-control" id="soluong2" v-model=v2
                                       name="value2" value="{{ old('soluong2')}}" placeholder="0"
                                       type="number" vueAttribute='v2'>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="form-group row" id='line3'>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-md-8 control-label" for="selectbasic" >3</label>
                                </div>
                                <div class="col-md-2">
                                    <select id="maMH3" name="maMH3" value="{{ old('maMH3')}}"
                                            onchange="mathang3Changed()" class="form-control">
                                        <option value>Chọn Mã mặt hàng</option>

                                        @foreach ($mathangs as $mh)
                                            <option value="{{ $mh->id }}">{{ $mh->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" id="tenMH3" name="tenMH3" value="{{ old('tenMH3') }}">
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" id="gia3" name="gia3" value="{{ old('gia3') }}">
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" id="donvi3" name="donvi3" value="{{ old('donvi3') }}">
                                </div>
                                <div class="col-md-2">
                                    <input class="col-md-8 form-control" id="soluong3" v-model=v3
                                           name="value3" value="{{ old('soluong3')}}" placeholder="0"
                                           type="number" vueAttribute='v3'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id='line4'>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-1">
                                <label class="col-md-8 control-label" for="selectbasic" >4</label>
                            </div>
                            <div class="col-md-2">
                                <select id="maMH4" name="maMH4" value="{{ old('maMH4')}}"
                                        onchange="mathang4Changed()" class="form-control">
                                    <option value>Chọn Mã mặt hàng</option>

                                    @foreach ($mathangs as $mh)
                                        <option value="{{ $mh->id }}">{{ $mh->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="text" id="tenMH4" name="tenMH4" value="{{ old('tenMH4') }}">
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="text" id="gia4" name="gia4" value="{{ old('gia4') }}">
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="text" id="donvi4" name="donvi4" value="{{ old('donvi4') }}">
                            </div>
                            <div class="col-md-2">
                                <input class="col-md-8 form-control" id="soluong4" v-model=v4
                                       name="value4" value="{{ old('soluong4')}}" placeholder="0"
                                       type="number" vueAttribute='v4'>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="form-group row" id='line5'>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <label class="col-md-8 control-label" for="selectbasic" >5</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select id="maMH5" name="maMH5" value="{{ old('maMH5')}}"
                                                onchange="mathang5Changed()" class="form-control">
                                            <option value>Chọn Mã mặt hàng</option>

                                            @foreach ($mathangs as $mh)
                                                <option value="{{ $mh->id }}">{{ $mh->id }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" id="tenMH5" name="tenMH5" value="{{ old('tenMH5') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" id="gia5" name="gia5" value="{{ old('gia5') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" id="donvi5" name="donvi5" value="{{ old('donvi5') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <input class="col-md-8 form-control" id="soluong5" v-model=v5
                                               name="value5" value="{{ old('soluong5')}}" placeholder="0"
                                               type="number" vueAttribute='v5'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <hr>
                    <div class="form-group row" id='totals'>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-4 control-label" for="selectbasic">Tổng tiền</label>
                                    <input class="form-control" type="text" name="thanhtien">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-4 control-label" for="selectbasic">Tổng số</label>
                                    <input class="form-control" type="text" name="tongso">
                                </div>
                                <div class="col-md-5">
                                    <label class="col-md-4 control-label" for="selectbasic">Lý do xuất kho</label>
                                    <textarea class="form-control" type="text" name="lydo"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal" id='through'>
                    <div class="form-group row" id='buttons'>
                        <div class="col-sm-12 ml-auto">
                            <button type="button" onclick="cancel()" class="btn btn-secondary">Hủy</button>
                            <button type="button" onclick="showAll()" class="btn btn-primary" name="btnshow"
                                    id="btnadd">Xem danh sách</button>
                            <button type="submit" class="btn btn-primary" name="btnadd" id="btnadd" onclick="save()">Lưu phiếu</button>
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
                        <th>Số lượng trong kho</th>
                        <th>Đơn vị</th>
                        <th>Đơn giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for='mathang in mathangs'>
                        <td class="">@{{mathang.id}}</td>
                        <td class="table-active">@{{mathang.tenMH}}</td>
                        <td class="">@{{mathang.so_luong_trong_kho}}</td>
                        <td class="table-active">@{{mathang.don_vi_tinh}}</td>
                        <td class="">@{{mathang.don_gia}}</td>
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
        function mathangChanged(){
            ma = $("#maMH1").val();
            params={ ma : ma };
            axios.get("{{ route('mhInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                mathang = data.mhh;
                mathang.forEach(mathang => {
                    $("#tenMH1").val(function() {
                        return mathang.tenMH;
                    });
                    $("#gia1").val(function() {
                        return mathang.don_gia;
                    });
                    $("#donvi1").val(function() {
                        return mathang.don_vi_tinh;
                    });
                });
            });
        }

        function mathang2Changed(){
            ma = $("#maMH2").val();
            params={ ma : ma };
            axios.get("{{ route('mhInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                mathang = data.mhh;
                mathang.forEach(mathang => {
                    $("#tenMH2").val(function() {
                        return mathang.tenMH;
                    });
                    $("#gia2").val(function() {
                        return mathang.don_gia;
                    });
                    $("#donvi2").val(function() {
                        return mathang.don_vi_tinh;
                    });
                });
            });
        }

        function mathang3Changed(){
            ma = $("#maMH3").val();
            params={ ma : ma };
            axios.get("{{ route('mhInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                mathang = data.mhh;
                mathang.forEach(mathang => {
                    $("#tenMH3").val(function() {
                        return mathang.tenMH;
                    });
                    $("#gia3").val(function() {
                        return mathang.don_gia;
                    });
                    $("#donvi3").val(function() {
                        return mathang.don_vi_tinh;
                    });
                });
            });
        }

        function mathang4Changed(){
            ma = $("#maMH4").val();
            params={ ma : ma };
            axios.get("{{ route('mhInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                mathang = data.mhh;
                mathang.forEach(mathang => {
                    $("#tenMH4").val(function() {
                        return mathang.tenMH;
                    });
                    $("#gia4").val(function() {
                        return mathang.don_gia;
                    });
                    $("#donvi4").val(function() {
                        return mathang.don_vi_tinh;
                    });
                });
            });
        }

        function mathang5Changed(){
            ma = $("#maMH5").val();
            params={ ma : ma };
            axios.get("{{ route('mhInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                mathang = data.mhh;
                mathang.forEach(mathang => {
                    $("#tenMH5").val(function() {
                        return mathang.tenMH;
                    });
                    $("#gia5").val(function() {
                        return mathang.don_gia;
                    });
                    $("#donvi5").val(function() {
                        return mathang.don_vi_tinh;
                    });
                });
            });
        }
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
            location.href="<?php echo e(route("xuatkho.index")); ?>"
        }

        function save() {
            location.href=" <?php echo e(route("xuatkho.store")); ?> "
        }

    </script>
@endsection
