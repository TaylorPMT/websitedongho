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

                                 <th>Tên Sản Phẩm</th>
                                 <th>Giá tiền</th>
                                 <th>Số lượng</th>
                                 <th>Thành tiền</th>

                                 <th>Ngày Đặt Mua</th>



                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($list as $row)
                                <tr>


                                    <td> {{ $row->nameproduct}}</td>
                                    <td> {{ $row->price }}</td>
                                    <td>{{ $row->quantity }}</td>
                                    <td>{{ $row->amount }}</td>
                                    <td class="text-info">{{ date("d-m-Y", strtotime($row->created_at))}}</td>



                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <td ><a href="{{ Route('orderapproved') }}" class="btn btn-sm btn-warning">Quay Trở Lại</a> </td>
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
