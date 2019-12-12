{{--  <!!--view-->  --}}
@php
use Illuminate\Support\Carbon;

@endphp


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

                                    <th scope="col">#</th>
                                    <th scope="col">Hình Ảnh Sản Phẩm</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Thành Tiền</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td></td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td></td>
                                    <td></td>
                                    <td>@twitter</td>
                                    <td colspan="2">Larry the Bird</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">4</th>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                  </tr>

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
