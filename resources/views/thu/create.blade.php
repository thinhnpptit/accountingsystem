@extends('layouts.app')

@section('header')
    <title>Phiếu thu quỹ</title>
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
            <form name="form" id="newAccount" action="{{ route("thu.store")}}" method="post">
                @csrf
                <div class="title"><strong>Tạo phiếu thu quỹ</strong></div>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                            <div class="col-md-1">
                            </div>
                                <div class="col-md-3">
                                    <label class="col-md-12 control-label" for="selectbasic" class="form-control">Nhân viên giao tiền</label>
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
                                           class="form-control">Lý do thu</label>
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
                                    <label class="col-md-12 control-label" for="selectbasic">Số Hóa đơn bán hàng( nếu có)</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Tiền thu</label>
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
                                            onchange="banhangChanged()" class="form-control">
                                        <option value>Chọn số Hóa đơn bán hàng</option>

                                        @foreach ($banhangs as $mh)
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
                                        onchange="banhang2Changed()" class="form-control">
                                    <option value>Chọn số Hóa đơn bán hàng</option>

                                    @foreach ($banhangs as $mh)
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
                                            onchange="banhang3Changed()" class="form-control">
                                        <option value>Chọn số Hóa đơn bán hàng</option>

                                        @foreach ($banhangs as $mh)
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
                                        onchange="banhang4Changed()" class="form-control">
                                    <option value>Chọn số Hóa đơn bán hàng</option>

                                    @foreach ($banhangs as $mh)
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
                                                onchange="banhang5Changed()" class="form-control">
                                            <option value>Chọn số Hóa đơn bán hàng</option>

                                            @foreach ($banhangs as $mh)
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
                                    <label class="col-md-12 control-label" for="selectbasic">Tổng tiền thu</label>
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
            <div v-show='banhangs && banhangs.length ' class="table-responsive">
                <br>
                <table id="banhangs" class="display">
                    <thead>
                    <tr class="table-active">
                        <th class="">Số phiếu bán hàng</th>
                        <th>Khách hàng mua</th>
                        <th>ngày bán</th>
                        <th>tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for='banhang in banhangs'>
                        <td class="">@{{banhang.id}}</td>
                        <td class="table-active">@{{banhang.khachhang}}</td>
                        <td class="table-active">@{{banhang.ngay_mua}}</td>
                        <td class="">@{{banhang.thanhtien}}</td>
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
        function banhangChanged(){
            ma = $("#maMH1").val();
            params={ ma : ma };
            axios.get("{{ route('banhangInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                banhang = data.mhh;
                banhang.forEach(banhang => {
                    $("#thanhtien").val(function() {
                        return (parseInt($("#thanhtien").val())+ banhang.thanhtien - parseInt($("#tien1").val()));
                    });
                    $("#tien1").val(function() {
                        return banhang.thanhtien;
                    });
                });
            });
        }

        function banhang2Changed(){
            ma = $("#maMH2").val();
            params={ ma : ma };
            axios.get("{{ route('banhangInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                banhang = data.mhh;
                banhang.forEach(banhang => {
                    $("#thanhtien").val(function() {
                        return (parseInt($("#thanhtien").val())+ banhang.thanhtien - parseInt($("#tien2").val()));
                    });
                    $("#tien2").val(function() {
                        return banhang.thanhtien;
                    });

                });
            });
        }

        function banhang3Changed(){
            ma = $("#maMH3").val();
            params={ ma : ma };
            axios.get("{{ route('banhangInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                banhang = data.mhh;
                banhang.forEach(banhang => {
                    $("#thanhtien").val(function() {
                        return (parseInt($("#thanhtien").val())+ banhang.thanhtien - parseInt($("#tien3").val()));
                    });
                    $("#tien3").val(function() {
                        return banhang.thanhtien;
                    });

                });
            });
        }

        function banhang4Changed(){
            ma = $("#maMH4").val();
            params={ ma : ma };
            axios.get("{{ route('banhangInfo') }}" , { params : params }). then (reply => {
                data=reply.data;
                banhang = data.mhh;
                banhang.forEach(banhang => {
                    $("#thanhtien").val(function() {
                        return (parseInt($("#thanhtien").val())+ banhang.thanhtien - parseInt($("#tien4").val()));
                    });
                    $("#tien4").val(function() {
                        return banhang.thanhtien;
                    });
                });
            });
        }

        function banhang5Changed(){
            ma = $("#maMH5").val();
            params={ ma : ma };
            axios.get("{{ route('banhangInfo') }}" , { params : params }). then (reply => {
                data = reply.data;
                banhang = data.mhh;
                banhang.forEach(banhang => {
                    $("#thanhtien").val(function() {
                        return (parseInt($("#thanhtien").val())+ banhang.thanhtien - parseInt($("#tien5").val()));
                    });
                    $("#tien5").val(function () {
                        return banhang.thanhtien;
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
            VueApp.getBanhangs('table#banhangs', options);
        } );

        function cancel(){
            location.reload();
        }

        function showAll(){
            location.href="<?php echo e(route("thu.index")); ?>"
        }

        function save() {
            location.href=" <?php echo e(route("thu.store")); ?> "
        }

    </script>
@endsection
