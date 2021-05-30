@extends('layouts.app')

@section('header')
    <title>Phiếu chi quỹ</title>
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
            <form name="form" id="newAccount" action="{{ route("chi.store")}}" method="post">
                @csrf
                <div class="title"><strong>Tạo phiếu chi quỹ</strong></div>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                            <div class="col-md-1">
                            </div>
                                <div class="col-md-3">
                                    <label class="col-md-12 control-label" for="selectbasic" class="form-control">Nhân viên nhận</label>
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
                                <div class="col-md-5">
                                    <label class="col-md-6 control-label" for="selectbasic"
                                           class="form-control">Lý do chi</label>
                                    <textarea class="form-control" type="text" name="lydo5"></textarea>
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
                                <div class="col-md-3">
                                    <label class="col-md-12 control-label" for="selectbasic">Số Phiếu Mua hàng( nếu có)</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Tiền chi</label>
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
                                <div class="col-md-3">
                                    <select id="maMH1" name="maMH1" value="{{ old('maMH1')}}"
                                            onchange="muahangChanged()" class="form-control">
                                        <option value>Chọn số phiếu mua hàng</option>

                                        @foreach ($muahangs as $mh)
                                            <option value="{{ $mh->id }}">{{ $mh->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" id="tien1" name="tien1" value="0" onchange="ip1Changed()">
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
                            <div class="col-md-3">
                                <select id="maMH2" name="maMH2" value="{{ old('maMH2')}}"
                                        onchange="muahang2Changed()" class="form-control">
                                    <option value>Chọn số phiếu mua hàng</option>

                                    @foreach ($muahangs as $mh)
                                        <option value="{{ $mh->id }}">{{ $mh->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="text" id="tien2" name="tien2" value="0" onchange="ip2Changed()">
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
                                <div class="col-md-3">
                                    <select id="maMH3" name="maMH3" value="{{ old('maMH3')}}"
                                            onchange="muahang3Changed()" class="form-control">
                                        <option value>Chọn số phiếu mua hàng</option>

                                        @foreach ($muahangs as $mh)
                                            <option value="{{ $mh->id }}">{{ $mh->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" id="tien3" name="tien3" value="0" onchange="ip3Changed()">
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
                            <div class="col-md-3">
                                <select id="maMH4" name="maMH4" value="{{ old('maMH4')}}"
                                        onchange="muahang4Changed()" class="form-control">
                                    <option value>Chọn số phiếu mua hàng</option>

                                    @foreach ($muahangs as $mh)
                                        <option value="{{ $mh->id }}">{{ $mh->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="text" id="tien4" name="tien4" value="0" onchange="ip4Changed()">
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
                                    <div class="col-md-3">
                                        <select id="maMH5" name="maMH5" value="{{ old('maMH5')}}"
                                                onchange="muahang5Changed()" class="form-control">
                                            <option value>Chọn số phiếu mua hàng</option>

                                            @foreach ($muahangs as $mh)
                                                <option value="{{ $mh->id }}">{{ $mh->id }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" id="tien5" name="tien5" value="0" onchange="ip5Changed()">
                                    </div>

                                </div>
                            </div>
                        </div>
                    <hr>
                    <div class="form-group row" id='totals'>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-12 control-label" for="selectbasic">Tổng tiền chi</label>
                                    <input class="form-control" id="thanhtien" type="text" name="thanhtien" value="0">
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
            <div v-show='muahangs && muahangs.length ' class="table-responsive">
                <br>
                <table id="muahangs" class="display">
                    <thead>
                    <tr class="table-active">
                        <th class="">Số phiếu mua hàng</th>
                        <th>phân loại</th>
                        <th>ngày mua</th>
                        <th>tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for='muahang in muahangs'>
                        <td class="">@{{muahang.id}}</td>
                        <td class="table-active">@{{muahang.phan_loai}}</td>
                        <td class="table-active">@{{muahang.ngay_mua}}</td>
                        <td class="">@{{muahang.thanh_tien}}</td>
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
        function muahangChanged(){
            ma = $("#maMH1").val();
            params={ ma : ma };
            axios.get("{{ route('muahangInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                muahang = data.mhh;
                muahang.forEach(muahang => {
                    $("#thanhtien").val(function() {
                        return (parseInt($("#thanhtien").val())+ muahang.thanh_tien - parseInt($("#tien1").val()));
                    });
                    $("#tien1").val(function() {
                        return muahang.thanh_tien;
                    });
                });
            });
        }

        function muahang2Changed(){
            ma = $("#maMH2").val();
            params={ ma : ma };
            axios.get("{{ route('muahangInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                muahang = data.mhh;
                muahang.forEach(muahang => {
                    $("#thanhtien").val(function() {
                        return (parseInt($("#thanhtien").val())+ muahang.thanh_tien - parseInt($("#tien2").val()));
                    });
                    $("#tien2").val(function() {
                        return muahang.thanh_tien;
                    });

                });
            });
        }

        function muahang3Changed(){
            ma = $("#maMH3").val();
            params={ ma : ma };
            axios.get("{{ route('muahangInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                muahang = data.mhh;
                muahang.forEach(muahang => {
                    $("#thanhtien").val(function() {
                        return (parseInt($("#thanhtien").val())+ muahang.thanh_tien - parseInt($("#tien3").val()));
                    });
                    $("#tien3").val(function() {
                        return muahang.thanh_tien;
                    });

                });
            });
        }

        function muahang4Changed(){
            ma = $("#maMH4").val();
            params={ ma : ma };
            axios.get("{{ route('muahangInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                muahang = data.mhh;
                muahang.forEach(muahang => {
                    $("#thanhtien").val(function() {
                        return (parseInt($("#thanhtien").val())+ muahang.thanh_tien - parseInt($("#tien4").val()));
                    });
                    $("#tien4").val(function() {
                        return muahang.thanh_tien;
                    });
                });
            });
        }

        function muahang5Changed(){
            ma = $("#maMH5").val();
            params={ ma : ma };
            axios.get("{{ route('muahangInfo') }}" , { params : params }). then (reply => {
                data = reply.data;
                muahang = data.mhh;
                muahang.forEach(muahang => {
                    $("#thanhtien").val(function() {
                        return (parseInt($("#thanhtien").val())+ muahang.thanh_tien - parseInt($("#tien5").val()));
                    });
                    $("#tien5").val(function () {
                        return muahang.thanh_tien;
                    });
                });
            });
        }

        function ip1Changed() {
            $("#thanhtien").val(function() {
                return (parseInt($("#thanhtien").val())+parseInt($("#tien1").val()));
            });
        }

        function ip2Changed() {
            $("#thanhtien").val(function() {
                return (parseInt($("#thanhtien").val())+parseInt($("#tien2").val()));
            });
        }

        function ip3Changed() {
            $("#thanhtien").val(function() {
                return (parseInt($("#thanhtien").val())+parseInt($("#tien3").val()));
            });
        }

        function ip4Changed() {
            $("#thanhtien").val(function() {
                return (parseInt($("#thanhtien").val())+parseInt($("#tien4").val()));
            });
        }
        function ip5Changed() {
            $("#thanhtien").val(function() {
                return (parseInt($("#thanhtien").val())+parseInt($("#tien5").val()));
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
            VueApp.getMuahangs('table#muahangs', options);
        } );

        function cancel(){
            location.reload();
        }

        function showAll(){
            location.href="<?php echo e(route("chi.index")); ?>"
        }

        function save() {
            location.href=" <?php echo e(route("chi.store")); ?> "
        }

    </script>
@endsection
