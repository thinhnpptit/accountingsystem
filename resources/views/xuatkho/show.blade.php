@extends('layouts.app')

@section('header')
    <title>Phiếu xuất kho</title>

    <link rel="stylesheet" type="text/css" href="  https://printjs-4de6.kxcdn.com/print.min.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <style>
        form .form-control:disabled,
        form textarea[readonly],
        form .form-control[readonly] {
            background: white !important;
            color: black;
            margin-bottom: 12px;
        }
    </style>

@endsection

@section('content')
    <div class="col-lg-12">
        <div class="block">

            <div class="title"><strong>Chi tiết phiếu xuất số {{ $xuat->id }}</strong></div>
            <div class="block-body">
                <form name="form" id="showform" action="" method="post" class="form-horizontal">
                    <div id="printJS-form">
                        <link rel="stylesheet" href="/core/vendor/bootstrap/css/bootstrap.min.css">

                        <div class="form-group row">
                            <div class="col-md-12 col-sm-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="col-md-4 control-label" for="selectbasic">Số phiếu</label>
                                        <input class="form-control" value="{{ $xuat->id }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-8 control-label" for="selectbasic">Ngày xuất</label>
                                        <input type="text" id="chartvalue" name="ngaymua" class="form-control"
                                               value="{{ $xuat->ngay_xuat }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-8 control-label" for="selectbasic">Lý do xuất</label>
                                        <div class="show_product"></div>
                                        <textarea type="text" id="chartvalue" name="soluong" class="form-control"
                                                  value="">{{ $xuat->ly_do }}</textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="line"> </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="col-md-8 control-label" for="selectbasic">Tổng hàng</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-8 control-label" for="selectbasic">Nhân viên</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" id="chartvalue" name="thanhtien" class="form-control"
                                               value="{{ $xuat->tong_hang }}">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="chartvalue" name="nhanvien" class="form-control"
                                               value="{{ \App\Models\NhanVien::find($xuat->nhanvien_id)->tenNV }}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="col-md-12 control-label" for="selectbasic">Tên mặt hàng</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-8 control-label" for="selectbasic">Số lượng</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-8 control-label" for="selectbasic">Đơn giá</label>
                                    </div>
                                </div>
                                @foreach($khoan as $kc)
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" id="chartvalue" name="thanhtien" class="form-control"
                                                   value="{{ \App\Models\MatHang::find($kc->mat_hang_id)->tenMH }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" id="chartvalue" name="thanhtien" class="form-control"
                                                   value="{{ $kc->so_luong }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" id="chartvalue" name="nhanvien" class="form-control"
                                                   value="{{ $kc->don_gia }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary" style="height:41px ; width:101px ;margin: auto"
            onclick="printData()">Print Form</button>
@endsection

@section('footer')
    <script src="/core/js/jspdf.js"></script>
    <script src="/core/js/jquery-2.1.3.js"></script>
    <script src="/core/js/pdfFromHTML.js"></script>
    <!-- these js files are used for making PDF -->
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

    <script>
        $( function(){
            $('form#showform input', ).prop('readonly',true);
            $('form#showform textarea', ).prop('readonly',true);


        });

        function printData(){
            var divToPrint=document.getElementById("printJS-form");
            newWin= window.open("", "", "width=800,height=800");;
            newWin.document.write('<head><link type="text/css" rel="stylesheet" href="/core/vendor/bootstrap/css/bootstrap.min.css" media="all"> <link rel="stylesheet"  media="print" href="/core/css/printcss.css" ><!-- Font Awesome CSS--> <link type="text/css" rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css" media="all"> <!-- Custom Font Icons CSS--> <link type="text/css" rel="stylesheet" href="css/font.css" media="all"> <!-- Google fonts - Muli--> <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700" media="all"> <!-- theme stylesheet--> <link type="text/css" rel="stylesheet" href="css/style.default.css" id="theme-stylesheet" media="all"> <!-- Custom stylesheet - for your changes--> <link type="text/css" rel="stylesheet" href="css/custom.css" media="all"> <!-- Favicon--> <link type="text/css" rel="shortcut icon" href="img/favicon1.png" media="all"></head><div class="jumbotron"> <h3>Invoice Voucher<h3></div><div class="container">');
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write('</div>');

            setTimeout(function () {
                newWin.print();
                newWin.close();
            }, 500);

        }
    </script>
@endsection
