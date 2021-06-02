@extends('layouts.app')
<title>Danh Sách Hoá Đơn Bán</title>
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
        <div class="title"><strong>Danh Sách Hoá Đơn Bán</strong></div>
        <div class="block-body">
            <form name="form" id="form1" action="" method="post">
                <br>
                <div align="center" id="txtshow">
                    <div class="table-responsive">
                        <table id="tables" class="display">
                            <thead>
                                <tr class="table-active">
                                    <th class="table-danger">ID Hoá Đơn</th>
                                    <th>Ngày Tạo</th>
                                    <th>Nhân Viên</th>
                                    <th>Tổng Tiền</th>
                                    <th>Khách hàng</th>
                                    <th>Xem chi tiết Hoá Đơn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banhangs as $p)
                                <tr>
                                    <td class="table-active">{{ $p->id  }}</td>
                                    <td class="table-secondary">{{ $p->ngay_mua }}</td>
                                    <td>{{ App\Models\NhanVien::find($p->nhanvien_id)->tenNV  }}</td>
                                    <td>{{ $p->thanhtien   }}</td>
                                    <td>{{ $p->khachhang }}</td>
                                    <td><a href="{{ route('banhang.show',$p->id)}}">Xem chi tiết</a> </td>
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
