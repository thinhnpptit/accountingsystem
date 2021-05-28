@extends('layouts.app')
<title>Danh Sách Phiếu Nhập Kho</title>
@section('header')

<link rel="stylesheet" type="text/css" href="/core/css/datatable.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<style>
    [cloak] {
        display: none !important;
    }
</style>
@endsection

@section('content')
<div class="col-lg-12" cloak>
    <div class="block">
        <div class="title"><strong>Danh Sách Phiếu Nhập Kho</strong></div>
        <div class="block-body">
                <br>
                <div align="center" id="txtshow">
                    <div class="table-responsive">
                        <table id="tables" class="display">
                            <thead>
                                <tr class="table-active">
                                    <th>In Phiếu</th>
                                    <th>Sửa|Xoá </th>
                                    <th>ID Phiếu</th>
                                    <th>Ngày Nhập</th>
                                    <th>Người Lập Phiếu</th>
                                    <th>Nhà Cung Cấp</th>
                                    <th>Tên hàng</th>
                                    <th>Số lượng</th>
                                    <th>Đơn vị</th>
                                    <th>Tổng Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nhapkho as $mh1)
                                @foreach ($mh1->mathang as $mh )
                                <tr>
                                    <td><a href="{{ route('nhapkho.show',$mh1->id)}}">In</a> </td>
                                    <td>
                                        <a href="{{ route('nhapkho.edit', $mh1->id)}}">Sửa</a> |
                                        <a href="#" onclick="$('form#nhapkhooice_delete_{{$mh1->id}}').trigger('submit')">Xoá</a>
                                        <div style='display=none'>
                                            <form id='nhapkhooice_delete_{{$mh1->id}}' method='POST' action="{{ route('nhapkho.destroy', $mh1->id)}}" >
                                                @method('DELETE')
                                                @csrf

                                            {{-- @if ($mh1->Bill == 10) --}}
                                             <input name="cust" style="display:none" value="true" type="text"/>
                                             {{-- @endif --}}
                                            </form>
                                        </div>
                                    </td>
                                    <td class="table-active">{{ $mh1->id  }}</td>
                                    <td class="table-secondary">{{ $mh1->ngay_nhap   }}</td>
                                    <td> {{ \App\Models\NhanVien::find($mh1->nhanvien_id)->tenNV }} </td>
                                    <td> {{ $mh1->nha_cc }} </td>
                                    {{-- @foreach (\App\Models\PhieuNhapKho::find($mh1->id)->mathang as $mh ) --}}
                                    <td> {{ \App\Models\MatHang::find($mh->pivot->mat_hang_id)->tenMH }} </td>
                                    <td> {{ $mh->pivot->so_luong_nhap }} </td>
                                    <td> {{ \App\Models\MatHang::find($mh->pivot->mat_hang_id)->don_vi_tinh }} </td>
                                    {{-- @endforeach --}}
                                    <td class="table-active"> {{ $mh1->tong_tien }} </td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js">
</script>

<script>
    $(document).ready( function () {
        $('[cloak]').removeAttr('cloak');
        $('#tables').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    } );
</script>

@endsection
