{{--  <!!--view-->  --}}
@php
    use App\Models\Category;

    $listcat=Category::where(['status'=>1,'parentid'=>0])->get();

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
                        <li class="breadcrumb-item active">Sản Phẩm </li>

                    </ol>
            </div>
        </nav>
        <section class="clearfix maincontent">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 listcategorys">
                            @includeIf('frontend.sildebar_category')
                    </div>

                    <div class="col-md-9">
                        <h3 class="text-center">
                            @php

                                foreach($list as $cat)
                                {
                                    $idcat=$cat->catid;

                                }
                                $listcate=Category::where('id','=',$idcat)->get();

                                foreach($listcate as $t)
                                {
                                    $slug=$t->slug;


                                }


                            @endphp
                                <a href="{{url('sap-xep-giam/'.$slug)}}" class="btn btn-success">sắp xếp giảm</a>
                                <a href="{{url('sap-xep-tang/'.$slug)}}" class="btn btn-success">sắp xếp tăng dần</a>
                        </h3>
                           <div class="row">

                               {{--  <!!--Chi Tiết Sản Phẩm --!!>  --}}
                        @foreach ($list as $row)
                        <div class="col-md-4 ">
                                <div class="card w-100">
                                    <a href="{{ Route('slug',[$row->slug]) }}">
                                        <img src="{{ asset('img/product/'.$row->img) }}" class="card-img-top" alt="...">
                                    </a>
                                        <div class="card-body">
                                                <a href="{{ Route('slug',[$row->slug]) }}">
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
                        <div class ="row justify-content-center my-4">
                             {{$list->links()}}

                        </div>
                     </div>
                </div>
                {{-- <!!--Products--> --}}
        </section>
        @endsection

