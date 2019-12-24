{{--  <!!--view-->  --}}



@extends('layouts.layoutsite')
        @section('title','Giỏ Hàng')


        @section('session_header')
        <link rel="stylesheet" href="{{asset('css/home.css') }}">




        @endsection
        @section('content')
        <section class="clearfix maincontent">
            <div class="container">
                <div class="row">
                    <h3 class="text-center text-warning">Danh Sách Các Đơn Hàng Của Bạn</h3>
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
                                    <td><a href="{{ Route('orderdetailcart',['id'=>$row->code]) }}" class="btn btn-light" ><i class="fas fa-envelope-open-text"></i></a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </section>










        </section>
        @endsection
        @section('name')
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        @endsection
