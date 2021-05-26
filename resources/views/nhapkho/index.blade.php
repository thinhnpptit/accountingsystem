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
                <div id="txtshow">
                    <div class="table-responsive">
                        <table id="tables" class="display">
                            <thead>
                                <tr class="table-active">
                                    <th>In Phiếu</th>
                                    <th>Sửa|Xoá </th>
                                    <th>ID Phiếu</th>
                                    <th>Ngày Nhập</th>
                                    <th>Nhà Cung Cấp</th>
                                    <th>Người Lập Phiếu</th>
                                    <th>Tên hàng</th>
                                    <th>Số lượng</th>
                                    <th>Đơn vị</th>
                                    <th>Tổng Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nhapkho ?? '' as $nk)
                                <tr>
                                    <td><a href="{{ route('nhapkho.show',$nk->id)}}">In</a> </td>
                                    <td>
                                        <a href="{{ route('nhapkho.edit', $nk->id)}}">Sửa</a> |
                                        <a href="#" onclick="$('form#nkoice_delete_{{$nk->id}}').trigger('submit')">Xoá</a>
                                        <div style='display=none'>
                                            <form id='nkoice_delete_{{$nk->id}}' method='POST' action="{{ route('nhapkho.destroy', $nk->id)}}" >
                                                @method('DELETE')
                                                @csrf

                                            @if ($nk->Bill == 10)
                                             <input name="cust" style="display:none" value="true" type="text"/>
                                             @endif
                                            </form>
                                        </div>
                                    </td>
                                    <td class="table-active">{{ $nk->id  }}</td>
                                    <td class="table-secondary">{{ $nk->ngay_nhap   }}</td>
                                    <td> {{ $nk->nha_cc }} </td>
                                    <td> {{ \App\Models\NhanVien::find($nk->nhanvien_id)->tenNV }} </td>
                                    @foreach (\App\Models\PhieuNhapKho::find($nk->id)->mathang as $mh )

                                    <td> {{ \App\Models\MatHang::find($mh->pivot->mat_hang_id)->tenMH }} </td>
                                    @endforeach
                                    <td> {{ $nk->so_luong }} </td>
                                    <td> {{ $nk->don_vi }} </td>
                                    <td class="table-active"> {{ $nk->tong_tien }} </td>
                                </tr>
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
