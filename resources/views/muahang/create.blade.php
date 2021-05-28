@extends('layouts.app')

@section('header')
<title>Payment Voucher</title>
@endsection

@section('content')

<div class="col-lg-12">
    <div class="block">
        <div class="title"><strong>Hoá Đơn Bán</strong></div>
        <div class="block-body">
            <form name="form" id="form1" action="{{ route("muahang.store")}}" method="post" class="form-horizontal">
                @csrf
                <div id="HTMLtoPDF">
                    <div class="form-group row" id='NoAndDate'>
                        <div class="col-sm-9">
                            <label class="col-md-12 control-label font-weight-bold" for="selectbasic" >Loại phiếu</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="col-md-4 control-label" for="selectbasic">ID Hoá Đơn</label>
                                    <select id="selectbasic" name="selectbasic" value="{{ old('selectbasic') }}"
                                        class="form-control">
<<<<<<< HEAD
                                        <option value="0">{ Tự Động }</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-md-4 control-label" for="selectbasic"
                                        class="form-control">Ngày Tạo</label>
                                    <input required  type="date" id="datevalue" name="ngaymua" class="form-control"
                                        value="{{ old('datevalue') ?? "2018-00-00 " }}"/>
=======
                                        <option value="Mua hàng trong nước nhập kho">Mua hàng trong nước nhập kho</option>
                                        <option value="Mua hàng trong nước không qua kho">Mua hàng trong nước không qua kho</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-md-8 control-label" for="selectbasic"
                                        class="form-control">Ngày xuất phiếu</label>
                                    <input type="date" id="datevalue" name="ngaymua" class="form-control"
                                        value="{{ old('datevalue') ?? "2021-00-00 " }}"
                                         />
>>>>>>> upstream/main
                                </div>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                    <!-- <div class="line"> </div> </br> -->
                    <div class="form-group row" id='ChartaccountTopLine'>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Nhân Viên</label>
                                    <select name="nhanvien" id="byvalue" class="form-control">
                                        @foreach (\App\Models\NhanVien::all() as $nv )
                                        <option value=" {{ $nv->id}} ">
                                        {{ $nv->tenNV }}
                                        </option>
                                        @endforeach
=======
                    <div class="line"> </div>
                    <div class="form-group row" id='ChartaccountTopLine'>
                        <div class="col-sm-12">
                            <div class="row">
                                <label class="col-md-12 control-label font-weight-bold" for="selectbasic" >Nhân viên mua hàng</label>
                                <div class="col-md-3">
                                    <label class="col-md-12 control-label" for="selectbasic">Phòng ban</label>
                                    <div class="show_product"></div>
                                    <select id="phongban" name="phongban" class="form-control"
                                            onchange="phongbanChanged()" value="{{ old('phongban')}}">
                                        <option value>Chọn phòng ban làm việc</option>

                                        @foreach ($phongban as $pb)
                                            <option value="{{ $pb }}">{{ $pb }}
                                            </option>
                                        @endforeach

>>>>>>> upstream/main
                                    </select>
                                </div>
                                <div class="col-md-3">
<<<<<<< HEAD
                                    <label class="col-md-8 control-label" for="selectbasic">Phân Loại</label>
                                    <select id="subvalue1" name="phanloai" value="{{ old('subvalue1')}}"
                                        class="form-control">
                                        <option value=" Mua hàng trong nước nhập kho ">
                                            Mua hàng trong nước nhập kho
                                            </option>
                                        <option value=" Mua hàng nhập khẩu nhập kho ">
                                            Mua hàng nhập khẩu nhập kho
                                        </option>
=======
                                    <label class="col-md-8 control-label" for="selectbasic">Chức vụ</label>
                                    <select id="chucvu" name="chucvu" class="form-control"
                                            onchange="chucvuChanged()" value="{{ old('chucvu') }}">
>>>>>>> upstream/main
                                    </select>
                                </div>

                                <div class="col-md-3">
<<<<<<< HEAD
                                    <label class="col-md-8 control-label" for="selectbasic">Khách Hàng</label>
                                    <input required  class="col-md-8 form-control"
                                        name="khachhang"/>
                                </div>

                                <div class="col-md-3">
                                    <label class="input_fields col-md-8">
                                    </label>
                                    <button class="add_field_button col-md-8">Add</button>
=======
                                    <label class="col-md-8 control-label" for="selectbasic">Nhân viên</label>
                                    <select id="nhanvien" name="nhanvien" class="form-control" value="{{ old('nhanvien') }}">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"> </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <label class="col-md-12 control-label font-weight-bold" for="selectbasic" >Danh sách hàng mua</label>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Mặt hàng</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Nhà cung cấp</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Đơn giá</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Số lượng</label>
>>>>>>> upstream/main
                                </div>

                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                    <div class="line input_fields_wrap"> </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Nhà Cung Cấp</label>
                                    <input required  class="form-control"
                                        name="nhacc" placeholder="{ Nha cung cap }" />
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Mặt Hàng</label>
                                    <input class="form-control"
                                        name="tenMH" placeholder="{ Mat hang }" required />
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-8 control-label" for="selectbasic">Số Lượng</label>
                                    <input required  class=" form-control" id="soluong"
                                        name="soluong"  placeholder="0" onchange="changeSoluong(this)"
                                        type="text" />
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-8 control-label" for="selectbasic">Đơn Giá</label>
                                    <input required  class=" form-control" id="dongia" onchange="changeDongia(this)"
                                        name="dongia"  placeholder="0"
                                        type="number" />
                                </div>
=======
                    @for ($i = 1; $i <= 5; $i++) <div class="form-group row" id='line{{$i}}'>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <input class="form-control" type="text" name="tenMH{{$i}}" value="{{ old('tenMH' . $i) }}">
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" name="nhaCC{{$i}}" value="{{ old('nhaCC' . $i) }}">
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" name="dongia{{$i}}" value="{{ old('dongia' . $i) }}">
                                </div>
                                <div class="col-md-3">
                                    <input class="col-md-8 form-control" id="soluong{{$i}}" v-model="v{{$i}}"
                                            name="soluong{{$i}}" value="{{ old('soluong' . $i )}}" placeholder="1"
                                           type="number" vueAttribute='v{{$i}}'>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                <hr>
                <div class="form-group row" id='totals'>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-5">
                              <label class="col-md-4 control-label" for="selectbasic">Thành tiền</label>
                              <input class="form-control" type="text" name="thanhtien">
>>>>>>> upstream/main
                            </div>
                        </div>
                    </div>
                <hr>

                <div class="form-horizontal" id='through'>
<<<<<<< HEAD
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-md-4 control-label" for="selectbasic">Thành tiền</label>
                            <input required  class="form-control" type="text" name="thanhtien" id="thanhtien">
                        </div>
                    </div>
=======
>>>>>>> upstream/main
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
    </div>
</div>
</div>

@endsection

@section('footer')
<script src="{{ asset('js/app.js') }}" defer></script>

<script src="/core/js/jspdf.js"></script>
<script src="/core/js/jquery-2.1.3.js"></script>
<script src="/core/js/pdfFromHTML.js"></script>

<script type="text/javascript">




// soluong1.addEventListener('change', function() {
//     thanhtien1.value = soluong1.value * dongia1.value;
// });

// dongia1.addEventListener('change', function() {
//     thanhtien1.value = soluong1.value * dongia1.value;
// });

var soluong1 = document.getElementById('soluong');
var dongia1 = document.getElementById('dongia');

function changeSoluong(soluong){
    var thanhtien1 = document.getElementById('thanhtien');
    thanhtien1.value = soluong1.value;
}

$(document).ready(function() {


    // add them mat hang vao form
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID

	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div></div><div class="line input_fields_wrap"> </div> </br> <div class="col-sm-12"> <div class="row"> <div class="col-md-3"> <label class="col-md-8 control-label" for="selectbasic">Nhà Cung Cấp</label> <input required  class="form-control"   name="nhacc" placeholder="{ Nha cung cap }" > </div> <div class="col-md-3"> <label class="col-md-8 control-label" for="selectbasic">Mặt Hàng</label> <input required  class="form-control"   name="tenMH" placeholder="{ Mat hang }" > </div> <!-- <div class="col-md-3"> <select id="subvalue{{$i ?? ''}}" name="subvalue{{$i ?? ''}}"  class="form-control"> </select> </div> --> <div class="col-md-2"> <label class="col-md-8 control-label" for="selectbasic">Số Lượng</label> <input required  class=" form-control" id="soluong" v-model=v{{$i ?? ''}} name="soluong[]"  placeholder="0" type="number" > </div> <div class="col-md-2"> <label class="col-md-8 control-label" for="selectbasic">Đơn Giá</label> <input required  class=" form-control" id="dongia" v-model=v{{$i ?? ''}} name="dongia[]"  placeholder="0" type="number" > </div> </div> </div> </div></div>'); //add input box
		}
	});

	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});

    function target(e){
        e = e || window.event;
        var target = e.target || e.srcElement;
        return target;
    }

    function phongbanChanged(){
        phongban = $('#phongban').val();
        params={ phongban : phongban };
        axios.get("{{ route('vitriTheoPhongban') }}" , { params: params } ).then( reply=> {
            data=reply.data
            chucvu=data.chucvu;
            jQuery('#chucvu').html('');
            jQuery('#chucvu').html(' <option value >Chọn chức vụ</option>');
            chucvu.forEach(chucvu => {
                $("#chucvu").append(
                    '<option value= "' + chucvu.id + '" > ' + chucvu.chucvu + '</option>'
                    );
            });
        });
    }

    function chucvuChanged() {
        var vitri_id = $('#chucvu').val();
        params={ vitri_id : vitri_id };
        axios.get("{{ route('nhanvienTheovitri') }}" , { params : params }). then (reply => {
            data=reply.data;
            nhanvien = data.nhanvien;
            jQuery('#nhanvien').html('');
            jQuery('#nhanvien').html(' <option value >Chọn nhân viên</option>');
            nhanvien.forEach(nhanvien => {
                $("#nhanvien").append(
                    '<option value="' + nhanvien.id + '" >'  + nhanvien.tenNV + '</option>'
                );
            });
        });
    }

    function mathang(){
        console.log("ok");
    }
    function cancel(){
        location.reload();
    }

    function showAll(){
        location.href="{{ route("muahang.index") }}"
    }

    function save() {
      location.href=" {{ route("muahang.store") }} "
    }

    function applyOldValues(old){
        for (const field in old) {
            if (old.hasOwnProperty(field)) {
                const value = old[field];
                element=$($('form#form1 input[name=' + field +']')[0] || $('form#form1 select[name=' + field +']')[0]) ;
                if (element.attr('name') && (element.attr('type')!='hidden')) {
                    element.val(value);
                    if (element.attr('vueAttribute')){
                        VueApp[element.attr('vueAttribute')]=value;
                    } else {
                        if (element.attr('onChange')) {
                            eval(element.attr('onChange'));
                        } else {
                            element.trigger('input');
                        }
                    }
                }
                delete old[field];
                setTimeout(function() { applyOldValues(old) },100);
                return null
            }
        }
    }

    $( function () {
        old= {!! json_encode(old()) !!}
        applyOldValues(old);
    })

</script>


@endsection
