@extends('layouts.layoutadmin')
@section('title','Quản Lý Sản Phẩm')
@section('content')
@section('session_header')

{{--  <--!Vùng dataTables --!>  --}}
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css') }}" >


@endsection



<section class="clearfix maincontent my-3">
    <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                        <strong class="text-danger">
                            Quản lý Danh Sách Đặt Hàng
                        </strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-sm btn-success"  href="{{ Route('approved') }}"><i class="fas fa-plus"  style="color: white;" > Danh Sách Đơn Hàng Đã Duyệt</i> </a>
                            <a class="btn btn-sm btn-danger" href="{{ Route('error') }}" style="color :white;"  href=""><i class="fas fa-trash-alt"  style="color: white;"> Danh Sách Đơn Hàng Bị Lỗi</i>
                            </a>
                            <a class="btn btn-sm btn-warning" href="{{ route('index-order') }}"><i class="fas fa-sign-out-alt"></i>Quay Lại
                            </a>
                        </div>

                    </div>

                </div>

            </div>
            <div class="card-body">
                @includeIf('backend.modules.message')
               <table id="myTable" class="table table-hover table-striped">
                   <thead>
                       <tr>

                            <th>Mã Đơn Đặt Hàng</th>
                            <th>Tên Người Đặt Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Email</th>

                            <th>Ngày Đặt Mua</th>
                            <th>Tình Trạng</th>
                            <th>Tổng Đơn Hàng</th>
                            <th>Xem Chi Tiết Đơn</th>

                       </tr>

                   </thead>
                   <tbody>
                       @foreach ($list as $row)
                           <tr>


                               <td>{{ $row->code }}</td>
                               <td> {{ $row->deliveryname }}</td>
                               <td>{{ $row->deliveryphone }}</td>
                               <td>{{ $row->deliveryemail }}</td>
                               <td class="text-info">{{ date("d-m-Y", strtotime($row->created_at))}}</td>
                               <td>
                                @if ($row->status==1)
                                <a class="btn btn-light" href=""><i class="fas fa-toggle-on">Đang Chờ</i></a>
                                @elseif($row->status==2)

                                <a class="btn btn-sm btn-warning" href="">Đã Duyệt<i class="fas fa-toggle-off"></i></a>
                                 @else
                                 <a class="btn btn-sm btn-danger" href="">Hủy Đơn<i class="fas fa-toggle-off"></i></a>
                                @endif


                               </td>
                               <td>{{ number_format($row->total_order) }} VNĐ</td>
                               <td><a href="{{ Route('orderdetail',['code'=>$row->code]) }}" class="btn btn-light" ><i class="fas fa-envelope-open-text"></i></a></td>

                           </tr>
                       @endforeach
                   </tbody>
               </table>
            </div>
            <div class="card-footer text-muted">

            </div>
    </div>
</section>
@endsection
@section('session_footer')

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>


@endsection


