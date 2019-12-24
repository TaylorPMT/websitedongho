@extends('layouts.layoutadmin')
@section('title','Quản Lý Sản Phẩm')
@section('content')
@section('session_header')

{{--  <--!Vùng dataTables --!>  --}}
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css') }}" >


@endsection

@section('content')

<section class="clearfix maincontent">
        <div class="container-fluid">
            <div class="row" style="min-height: 400px;">
                <div class="col">
                    <p class="text-center text-info ">Các Chức năng thực Hiện  </p>
                    <p class="text-center text-info ">Quản Lý Tin Tức</p>
                    <p class="text-center text-info ">Quản Lý Danh Mục Sản Phẩm </p>
                    <p class="text-center text-info ">Quản Lý Sản Phẩm </p>
                    <p class="text-center text-info ">Quản Lý Đơn Hàng</p>


                </div>
            </div>
        </div>
    </section>
@endsection

