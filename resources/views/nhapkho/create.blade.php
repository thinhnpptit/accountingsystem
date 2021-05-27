@extends('layouts.app')

@section('header')
<title>Phiếu Nhập Kho</title>
@endsection

@section('content')

<div class="col-lg-12">
    <div class="block">
        <div class="title"><strong>Phiếu Nhập Kho</strong></div>
        <div class="block-body">
            <form name="form" id="invoice" action="{{ route("nhapkho.store")}}" method="post" class="form-horizontal">
                @csrf
                <div id="HTMLtoPDF">
                    <div class="form-group row" id='NoAndDate'>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-4 control-label" for="selectbasic">ID Phiếu</label>
                                    <select id="selectbasic" name="selectbasic" value="{{ old('selectbasic') }}"
                                        class="form-control">
                                        <option value="0">{ Tự Động }</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-md-4 control-label" for="selectbasic"
                                        class="form-control">Ngày Nhập</label>
                                    <input type="date" id="datevalue" name="ngaynhap" class="form-control"
                                        value="{{ old('datevalue') ?? "2018-00-00 " }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"> </div>
                    <div class="form-group row" id='InvoiceTopLine'>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-md-4 control-label" for="selectbasic">Nhà Cung Cấp</label>
                                    <input class="form-control" name="nhacc">
                                </div>

                                <div class="col-md-5">
                                    <label class="col-md-5 control-label" for="selectbasic">Người Lập Phiếu</label>
                                    <select id="Customer" name="nhanvien" class="form-control">
                                        <option value>Lựa Chọn</option>
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
                    <br>
                    {{-- I am not using blade for because for some reason it messes with auto-formating  --}}
                    <div class="form-group row input_fields_wrap" >
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">

                                    <label class="col-md-9  control-label" for="selectbasic">Tên Mặt Hàng</label>
                                    <input class="form-control" name="tenMH[]">
                                </div>
                                <div class="col-md-2">

                                    <label class="col-md-9  control-label" for="selectbasic">Đơn Vị Tính</label>

                                    <select class="form-control" name="donvi[]">
                                        <option value="kg">kg</option>
                                        <option value="chiếc">chiếc</option>
                                    </select>
                                </div>
                                <div class="col-md-2">

                                    <label class="col-md-12  control-label" for="selectbasic">Số Lượng</label>

                                    <input class="form-control" name="soluong[]">
                                </div>
                                <div class="col-md-2">

                                    <label class="col-md-12 control-label" for="selectbasic">Đơn Giá</label>

                                    <input class="form-control" name="dongia[]">
                                </div>
                                <div class="col-md-2">

                                    <label class="col-md-12 control-label" for="selectbasic">Thành Tiền</label>

                                    <input class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <label class="input_fields col-md-8">
                                    </label>
                                    <button class="add_field_button col-md-8">Add</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="line" style='margin-bottom:22px'>  </div>

                    <div class="form-group row" id='totals'>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-9">
                                </div>

                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Tổng Tiền</label>
                                    <input id="byvalue" name="tongtien" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="form-horizontal" id='through'>
                        <!-- <div class="form-group row">
                            <label class="col-sm-1 form-control-label">Description</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="description" value="{{ old('description')}}"
                                    maxlength=255 name="description">{{ old('description')}}</textarea>
                            </div>
                        </div> -->
                        <div class="form-group row" id='buttons'>
                            <div class="col-sm-12 ml-auto">
                                <button type="button" onclick="cancel()" class="btn btn-secondary">Huỷ Bỏ</button>
                                <button type="button" onclick="showAll()" class="btn btn-primary" name="btnshow"
                                    id="btnadd">Hiện Tất Cả Phiếu</button>
                                <button type="submit" class="btn btn-primary" name="btnadd" id="btnadd">Lưu Phiếu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script src="{{ asset('js/app.js') }}" defer></script>

<script src="/core/js/jspdf.js"></script>
<script src="/core/js/jquery-2.1.3.js"></script>
<script src="/core/js/pdfFromHTML.js"></script>

<script>

$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID

	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div><div></div></div><div class="form-group row" style="width:100%; padding: 15px;" > <div class="col-sm-12"> <div class="row"> <div class="col-md-3"> <label class="col-md-9  control-label" for="selectbasic">Tên Mặt Hàng</label> <input class="form-control" name="tenMH[]"> </div> <div class="col-md-2"> <label class="col-md-9  control-label" for="selectbasic">Đơn Vị Tính</label> <select class="form-control" name="donvi[]"> <option value="kg">kg</option> <option value="chiếc">chiếc</option> </select> </div> <div class="col-md-2"> <label class="col-md-12  control-label" for="selectbasic">Số Lượng</label> <input class="form-control" name="soluong[]"> </div> <div class="col-md-2"> <label class="col-md-12 control-label" for="selectbasic">Đơn Giá</label> <input class="form-control" name="dongia[]"> </div> <div class="col-md-2"> <label class="col-md-12 control-label" for="selectbasic">Thành Tiền</label> <input class="form-control"> </div><div class="col-md-1"><button class="remove_field col-md-8">Remove</button></div></div> </div></div></div></div>'); //add input box
		}
	});

	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	});
});

    function cancel(){
        location.reload();
    }

    function showAll(){
        location.href="{{ route("nhapkho.index") }}"
    }

</script>

@endsection
