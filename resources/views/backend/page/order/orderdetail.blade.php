@extends('layouts.layoutadmin')
@section('title','Quản Lý Sản Phẩm')
@section('content')
@section('session_header')

{{--  <--!Vùng dataTables --!>  --}}
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css') }}" >


@endsection



<section class="clearfix maincontent">
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

                            <th>Mã Đơn Hàng</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Đơn Giá</th>

                            <th>Tổng giá sản phẩm</th>


                       </tr>

                   </thead>
                   <tbody>
                       @foreach ($list as $row)
                           <tr>
                                <td>{{  $id=$row->orderid}}</td>

                               <td>{{ $row->name }}</td>
                               <td>{{ $row->quantity }}</td>
                               <td>{{ $row->price }}</td>
                               <td class="text-info" colspan="2">{{ number_format($row->amount) }}VNĐ</td>


                           </tr>
                       @endforeach

                   </tbody>

               </table>


            </div>

            <div class="card-footer text-muted ">
                <div class="container">
                    <div class="row">
                        <span class="text-center" style="margin:auto">
                        <a href="{{ Route('status',['code'=>$id]) }}" class="btn btn-sm btn-success" style="color:white;">Duyệt Đơn Hàng</a>
                        <a   href="{{ Route('orderdetail-error',['code'=>$id]) }}" class="btn btn-sm btn-danger" style="color:white;">Hủy Đơn ( Đơn Bị Lỗi )</a>
                         </span>
                    </div>
                </div>

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


