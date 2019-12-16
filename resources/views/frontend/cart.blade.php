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
                    <h3 class="text-center text-warning">Giỏ Hàng Của Bạn </h3>

                    <table id="myTable" class="table table-hover table-striped my-5">
                            @includeIf('backend.modules.message')
                                <thead>
                                  <tr>

                                    <th scope="col">STT</th>
                                    <th scope="col">Hình Ảnh Sản Phẩm</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Thành Tiền</th>
                                    <th scope="col"></th>

                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                  @foreach ($cart->items as $item)
                                  <tr>
                                    {{--  shopping cart array list  --}}
                                      <th scope="row">{{ $i++ }}</th>
                                      <td><img class="img-fluid img-thumbnail" src="{{ asset('img/product/'.$item['img']) }}"></td>
                                      <td>{{ $item['name'] }}</td>
                                      <td>
                                          <form action="{{ Route('cart-update',['id'=>$item['id']]) }}" method="GET">

                                            <span >
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="small">
                                               <button type="submit" class="btn-success">Cập Nhật</button>
                                            </span>
                                          </form>
                                      </td>
                                      <td>{{ number_format($item['price']) }} VNĐ</td>
                                      <td>{{ number_format($item['price']*$item['quantity'] )}} VNĐ</td>

                                      <td><a href="{{ Route('cart-remove',['id'=>$item['id']]) }}"><i class="fas fa-times btn btn-danger"></i></a></td>
                                    </tr>
                                  @endforeach




                                </tbody>

                              </table>
                    <p style="
                    margin: auto;
                    text-align: center;">
                    <span  style="color: #007772;font-weight: bold;" >Tổng Cộng :  {{  number_format($cart->total_price)}} VNĐ</span>
                    <br>
                    <form action="{{ Route('done-cart') }}" method="POST">
                        @csrf()
                    <button type="submit" class="btn btn-success">Đặt Hàng</button>

                </form>
                 </p>

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
