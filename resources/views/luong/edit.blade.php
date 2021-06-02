@extends('layouts.app')

@section('header')
<title>Phiếu mua hàng</title>

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

        <div class="title"><strong>Sửa Phiếu mua hàng</strong></div>
        <div class="block-body">
          <form name="form" id="muahang" action="{{ route("muahang.update", $muahang->id)}}" method="post" class="form-horizontal">
            @method('PATCH')
            @csrf
                <div id="HTMLtoPDF">
                <link rel="stylesheet" href="/core/vendor/bootstrap/css/bootstrap.min.css">

                    <div class="form-group row">
                        <div class="col-md-12 col-sm-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-4 control-label" for="selectbasic">No</label>
                                     <input class="form-control" value="{{ $muahang->id }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-4 control-label" for="selectbasic"
                                        class="form-control">Phân loại</label>
                                        <select id="selectbasic" name="phanloai" value="{{ old('selectbasic') }}"
                                            class="form-control">
                                            <option value="Mua hàng trong nước nhập kho">Mua hàng trong nước nhập kho</option>
                                            <option value="Mua hàng trong nước không qua kho">Mua hàng trong nước không qua kho</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"> </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Số lượng</label>
                                    <div class="show_product"></div>
                                    <input type="text" id="chartvalue" name="soluong" class="form-control"
                                        value="{{ $muahang->so_luong }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Ngày mua</label>
                                    <input type="date" id="chartvalue" name="ngaymua" class="form-control"
                                        value="{{ $muahang->ngay_mua }}">
                                </div>
                                {{-- <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">SubAccount</label>

                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Tổng tiền</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Nhân viên mua hàng</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    {{-- <label class="col-md-8 control-label" for="selectbasic">{{ $muahang->thanh_tien }}
                                    </label> --}}
                                    <input class="form-control" type="text" name="thanhtien" class="form-control"
                                      value=" {{ $muahang->thanh_tien }} " >
                                </div>
                                <div class="col-md-3">
                                    <select name="nhanvien" id="byvalue" class="form-control">
                                        @foreach (\App\Models\NhanVien::all() as $nv )
                                        <option value=" {{ $nv->id}} ">
                                          {{ $nv->tenNV }}
                                        </option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" id='buttons'>
                      <div class="col-sm-12 ml-auto">
                          <button type="button" onclick="showAll()" class="btn btn-secondary">Cancel</button>
                          <button type="submit" class="btn btn-primary" name="btnadd" id="btnadd">Update</button>
                      </div>
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>
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
