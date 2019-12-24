{{--  <!!--view-->  --}}
@php
$s=0;
foreach($list as $row)
{
    $s++;
}
$key;
@endphp
@extends('layouts.layoutsite')
        @section('title','Sản Phẩm')


        @section('session_header')
        <link rel="stylesheet" href="{{asset('css/home.css') }}">
        @endsection
        @section('content')
        <nav aria-label="Page breadcrumb">
            <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Trang Chủ </li>
                        <li class="breadcrumb-item active">Tìm Kiếm </li>

                    </ol>
            </div>
        </nav>
        <section class="clearfix maincontent">
            <div class="container">
                    <h3>Sản Phẩm Bạn Vừa Tìm Là {{$key}}</h3>
                    <h3 class="text-success">Tìm Kiếm Được {{ $s }} Sản Phẩm 
                    </h3>


                        <div class="row my-5">
                               {{--  <!!--Chi Tiết Sản Phẩm --!!>  --}}
                        @foreach ($list as $row)
                        <div class="col-md-4 ">
                                <div class="card w-100">
                                    <a href="{{ Route('slug',[$row->slug]) }}">
                                        <img src="{{ asset('img/product/'.$row->img) }}" class="card-img-top" alt="...">
                                    </a>
                                        <div class="card-body">
                                                <a href="{{ url($row->slug) }}">
                                                    <h5 class="card-title">{{$row->name }}</h5>
                                                </a>
                                            <h5 class="card-price">{{ number_format($row->price) }}</h5>
                                            <p class="card-text"></p>
                                            @if (Session::get('name')!=null)
                                <a href="{{ Route('cart-add',['id'=>$row->id]) }}" class="form-control btn btn-primary">Đặt Mua</a>
                                @else
                                <a href="{{ Route('loginuser') }}" class="form-control btn btn-primary">Đặt Mua</a>
                                @endif
                                        </div>
                                        </div>
                                    </div>

                        @endforeach


                     </div>
                </div>
                {{-- <!!--Products--> --}}
        </section>
        @endsection

