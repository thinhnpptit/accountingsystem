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
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="col-md-4 control-label" for="selectbasic">ID Hoá Đơn</label>
                                    <select id="selectbasic" name="selectbasic" value="{{ old('selectbasic') }}"
                                        class="form-control">
                                        <option value="0">{ Tự Động }</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-md-4 control-label" for="selectbasic"
                                        class="form-control">Ngày Tạo</label>
                                    <input required  type="date" id="datevalue" name="ngaymua" class="form-control"
                                        value="{{ old('datevalue') ?? "2018-00-00 " }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Phân Loại</label>
                                    <select id="subvalue1" name="phanloai" value="{{ old('subvalue1')}}"
                                        class="form-control">
                                        <option value=" Mua hàng trong nước nhập kho ">
                                            Mua hàng trong nước nhập kho
                                            </option>
                                        <option value=" Mua hàng nhập khẩu nhập kho ">
                                            Mua hang nhập khẩu nhập kho
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-3" id="PBH">
                                    <label class="col-md-8 control-label" for="selectbasic">Khách Hàng</label>
                                    <input required  class="col-md-8 form-control"
                                        name="value1" placeholder="{ Phiếu Bán Hàng }" >
                                </div>

                                <div class="col-md-3" id="PMH">
                                    <label class="input_fields col-md-8">
                                    </label>
                                    <button class="add_field_button col-md-8">Add</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="line input_fields_wrap"> </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Nhà Cung Cấp</label>
                                    <input required  class="form-control"
                                        name="nhacc" placeholder="{ Nha cung cap }" >
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-8 control-label" for="selectbasic">Mặt Hàng</label>
                                    <input required  class="form-control"
                                        name="tenMH" placeholder="{ Mat hang }" >
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-8 control-label" for="selectbasic">Số Lượng</label>
                                    <input required  class=" form-control" id="value{{$i ?? ''}}"
                                        name="soluong"  placeholder="0"
                                        type="number" >
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-8 control-label" for="selectbasic">Đơn Giá</label>
                                    <input required  class=" form-control" id="value{{$i ?? ''}}"
                                        name="dongia"  placeholder="0"
                                        type="number" >
                                </div>
                            </div>
                        </div>
                </div>
                <hr>

                <div class="form-horizontal" id='through'>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-md-4 control-label" for="selectbasic">Thành tiền</label>
                            <input required  class="form-control" type="text" name="thanhtien">
                        </div>
                    </div>
                    <div class="form-group row" id='buttons'>
                        <div class="col-sm-12 ml-auto">
                            <button type="button" onclick="cancel()" class="btn btn-secondary">Cancel</button>
                            <button type="button" onclick="showAll()" class="btn btn-primary" name="btnshow"
                                id="btnadd">Show All</button>
                            <button type="submit" class="btn btn-primary" name="btnadd" id="btnadd" onclick="save()">Add To
                                Database</button>
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
			$(wrapper).append('<div></div><div class="line input_fields_wrap"> </div> </br> <div class="col-sm-12"> <div class="row"> <div class="col-md-3"> <label class="col-md-8 control-label" for="selectbasic">Nhà Cung Cấp</label> <input required  class="form-control"   name="nhacc" placeholder="{ Nha cung cap }" > </div> <div class="col-md-3"> <label class="col-md-8 control-label" for="selectbasic">Mặt Hàng</label> <input required  class="form-control"   name="tenMH" placeholder="{ Mat hang }" > </div> <!-- <div class="col-md-3"> <select id="subvalue{{$i ?? ''}}" name="subvalue{{$i ?? ''}}"  class="form-control"> </select> </div> --> <div class="col-md-2"> <label class="col-md-8 control-label" for="selectbasic">Số Lượng</label> <input required  class=" form-control" id="value{{$i ?? ''}}" v-model=v{{$i ?? ''}} name="soluong"  placeholder="0" type="number" > </div> <div class="col-md-2"> <label class="col-md-8 control-label" for="selectbasic">Đơn Giá</label> <input required  class=" form-control" id="value{{$i ?? ''}}" v-model=v{{$i ?? ''}} name="dongia"  placeholder="0" type="number" > </div> </div> </div> </div></div>'); //add input box
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

    function chartChanged(){
        chart_id = $('#chartvalue').val();
        params={ chart_id : chart_id };
        axios.get("{{ route('accountsOfChart') }}" , { params: params } ).then( reply=> {
            data=reply.data
            accounts=data.accounts;
            jQuery('#mainvalue').html('');
            jQuery('#mainvalue').html(' <option value >Select Account</option>');
            accounts.forEach(account => {
                $("#mainvalue").append(
                    '<option value= "' + account.id + '" > ' + account.name + '</option>'
                    );
            });
        });
    }

    function mainAccountChanged() {
        var account_id = $('#mainvalue').val();
        params={ account_id : account_id };
        axios.get("{{ route('subaccountsOfAccount') }}" , { params : params }). then (reply => {
            data=reply.data;
            el="[id^='subvalue']"
            $(el).html('');
            $(el).html('<option value >Select Account</option>');
            console.log(data)
            data.subaccounts.forEach(subAccount => {
                $(el).append(
                    '<option value="' + subAccount.subid + '" >'  + subAccount.accountname + '</option>'
                );
            });
        });
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
