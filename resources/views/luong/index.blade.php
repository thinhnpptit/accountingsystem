@extends('layouts.app')
<title>Bảng lương nhân viên</title>
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
        <div class="title"><strong>Bảng lương nhân viên</strong></div>
        <div class="block-body">
            <form name="form" id="form1" action="" method="post">
                <br>
                <div align="center" id="txtshow">
                    <div class="table-responsive">
                        <table id="tables" class="display">
                            <thead>
                                <tr class="table-active">
                                    <th>Tháng Lương số</th>
                                    <th>Mã NV</th>
                                    <th>Tên NV</th>
                                    <th>Tổng công</th>
                                    <th>Thưởng tháng</th>
                                    <th>Lương cơ bản</th>
                                    <th>Tổng lương</th>
                                    <th>Thuế thu nhập CN</th>
                                    <th>Bảo hiểm CN</th>
                                    <th>Lương nhận</th>
                                    <th>Trạng thái</th>
                                    <th>Cập nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($luong as $p)
                                <tr>
                                    <td>{{ $p->thang }}</td>
                                    <td class="table-active">{{ $p->nhanvien_id  }}</td>
                                     <td>{{ \App\Models\NhanVien::find($p->nhanvien_id)->tenNV }}</td>
                                    <td class="table-active">{{ $p->cong   }}</td>
                                    <td>{{ number_format( $p->tienthuong)   }}</td>
                                    <td class="table-active">{{ number_format( $p->luongcoban ) }}</td>
                                    <td>{{ number_format( $p->tongluong ) }}</td>
                                    <td class="table-active">{{ number_format( $p->thuecanhan ) }}</td>
                                    <td>{{ number_format( $p->bhyt ) }}</td>
                                    <td class="table-active">{{ number_format( $p->tongluong ) }}</td>
                                    <td>{{ $p->trangthai }}
                                    <td class="table-active">
                                        <a href="{{ route('luong.edit', $p->id)}}">Thanh toán</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
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
        $('#tables').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
        $('[cloak]').removeAttr('cloak');
    } );
</script>

@endsection
