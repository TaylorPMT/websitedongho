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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md col-md-6">
                               <span class="title">GIỚI THIỆU
                                   @php

                                    echo Carbon::now('Asia/Ho_Chi_Minh');


                                   @endphp
                            </span>
                            </div>
                        </div>
                    </div>
                </section>










        </section>
        @endsection
        @section('name')

        @endsection
