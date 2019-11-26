{{--  <!!--view-->  --}}
@php
use Illuminate\Support\Carbon;

@endphp


@extends('layouts.layoutsite')
        @section('title','Giới Thiệu')


        @section('session_header')
        <link rel="stylesheet" href="{{asset('css/home.css') }}">




        @endsection
        @section('content')
        <section class="clearfix maincontent">
            <div class="container">
                <div class="row listcategorys_silder">
                    <div class="col-md-3 listcategorys">
                            @includeIf('frontend.sildebar_category')
                    </div>
                    {{--  <!!--silder-->  --}}
                    <div class="col-md-9 silder">
                            @includeIf('frontend.sildebar_silder')
                     </div>
                </div>
                <section class="clearfix introduce">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <h3 class="title-introduce">Giới Thiệu
                            </h3>
                            <div class="description">
                                    <p><strong>Giáo viên hướng dẫn:</strong></p>
                                    <p>GV. Trần Văn Hùng</p>
                                     <p><strong>Thành viên thực hiện:</strong></p>
                                    <p>Phạm Minh Thiện</p>
                                    <p>Nguyễn Anh Nghĩa</p>
                                <span>  <p> <strong>Sử dụng framework Laravel để thực hiện</strong> </p>
                                    <p>Ở phần view, Laravel cung cấp sẵn cho người dùng một template enigine có tên là blade, giúp người dùng có thể sử dụng code php bên trong file giao diện của mình một cách thuật lợi </p>
                                    <p>Laravel sử dụng một field token ẩn để chống lại tấn công kiểu CSRF.</p>
                                    <p>Bản thân Laravel đã cung cấp cho người dùng rất nhiều các nhóm tính năng giúp quá trình phát triển trở nên nhanh chóng hơn rất nhiều lần.</p></span>
                            </div>
                        </div>
                </section>










        </section>
        @endsection
        @section('name')

        @endsection
