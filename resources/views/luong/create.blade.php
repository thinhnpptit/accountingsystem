@extends('layouts.app')

@section('header')
    <title>Tạo mới lương nhân viên</title>
@endsection

@section('content')

    <div class="col-lg-12">
        <div class="block">
            <div class="title"><strong>Tạo mới lương nhân viên</strong></div>
            <div class="block-body">
                <form name="form" id="form1" action="{{ route("luong.store")}}" method="post" class="form-horizontal">
                    @csrf
                    <div id="HTMLtoPDF">
                        <div class="form-group row" id='NoAndDate'>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="col-md-12 control-label" for="selectbasic">Chọn tháng tính lương</label>
                                        <select id="selectbasic" name="thang" value="{{ old('selectbasic') }}"
                                                class="form-control">
                                            <option value="1">Tháng 1</option>
                                            <option value="2">Tháng 2</option>
                                            <option value="3">Tháng 3</option>
                                            <option value="4">Tháng 4</option>
                                            <option value="5">Tháng 5</option>
                                            <option value="6">Tháng 6</option>
                                            <option value="7">Tháng 7</option>
                                            <option value="8">Tháng 8</option>
                                            <option value="9">Tháng 9</option>
                                            <option value="10">Tháng 10</option>
                                            <option value="11">Tháng 11</option>
                                            <option value="12">Tháng 12</option>
                                        
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-md-8 control-label" for="selectbasic"
                                               class="form-control">Ngày tạo</label>
                                        <input type="date" id="datevalue" name="ngaymua" class="form-control"
                                               value="{{ old('datevalue') ?? "2021-00-00 " }}"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="line"> </div>
                        <div class="form-group row" id='ChartaccountTopLine'>
                            <div class="col-sm-12">
                                <div class="row">
                                    <label class="col-md-12 control-label font-weight-bold" for="selectbasic" >Nhân viên</label>
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

                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="col-md-8 control-label" for="selectbasic">Chức vụ</label>
                                        <select id="chucvu" name="chucvu" class="form-control"
                                                onchange="chucvuChanged()" value="{{ old('chucvu') }}">
                                        </select>
                                    </div>

                                    <div class="col-md-3">
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
                                    <label class="col-md-12 control-label font-weight-bold" for="selectbasic" >Nhập các thông tin:</label>
                                    <div class="col-md-3">
                                        <label class="col-md-12 control-label" for="selectbasic">Tổng công trong tháng (/23 ngày)</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-8 control-label" for="selectbasic">Thưởng tháng này</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-8 control-label" for="selectbasic">Lương cơ bản</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-8 control-label" for="selectbasic">Thuế suất</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="cong" value="{{ old('cong') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="thuong" value="{{ old('thuong') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="coban" value="{{ old('coban') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="thue">
                                            <option value="5">5% (Đến 5 triệu đồng/tháng)</option>
                                            <option value="10">10% (Trên 5 triệu đến 10 triệu đồng/tháng)</option>
                                            <option value="15">15% (Trên 10 triệu đến 18 triệu đồng/tháng)</option>
                                            <option value="20">20% (Trên 18 triệu đến 32 triệu đồng/tháng)</option>
                                            <option value="25">25% (Trên 32 triệu đến 52 triệu đồng/tháng)</option>
                                            <option value="30">30% (Trên 52 triệu đến 80 triệu đồng/tháng)</option>
                                            <option value="35">35% (Trên 80 triệu đồng/tháng)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row" id='totals'>
                        </div>
                        <div class="form-horizontal" id='through'>
                            <div class="form-group row" id='buttons'>
                                <div class="col-sm-12 ml-auto">
                                    <button type="button" onclick="cancel()" class="btn btn-secondary">Hủy</button>
                                    <button type="button" onclick="showAll()" class="btn btn-primary" name="btnshow"
                                            id="btnadd">Xem danh sách</button>
                                    <button type="submit" class="btn btn-primary" name="btnadd" id="btnadd" onclick="save()">Tính lương</button>
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
            location.href="{{ route("luong.index") }}"
        }

        function save() {
            location.href=" {{ route("luong.store") }} "
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
