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
                    <h3 class="text-center text-warning">Giỏ Hàng </h3>
                    <form action="" method=""></form>
                        <table class="table table-bordered">
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
                                      <td>{{ $item['img'] }}</td>
                                      <td>{{ $item['name'] }}</td>
                                      <td>
                                          <form action="{{ Route('cart-update',['id'=>$item['id']]) }}" method="GET">
                                               <input type="number" name="quantity" value="{{ $item['quantity'] }}">
                                               <input type="submit">
                                          </form>
                                      </td>
                                      <td>{{ number_format($item['price']) }} VNĐ</td>
                                      <td>{{ number_format($item['price']*$item['quantity'] )}} VNĐ</td>

                                      <td><a href="{{ Route('cart-remove',['id'=>$item['id']]) }}"><i class="fas fa-times btn btn-danger"></i></a></td>
                                    </tr>
                                  @endforeach




                                </tbody>

                              </table>
                    </form>

                    <button class="btn btn-success">Đặt Hàng</button>
                </div>

            </div>

        </section>










        </section>
        @endsection
        @section('name')

        @endsection
