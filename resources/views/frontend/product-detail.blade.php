{{--  <!!--view-->  --}}
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

                    <div class="col-md-12">
                           <div class="row product-info">
                               {{--  <!!--Chi Tiết Sản Phẩm --!!>  --}}

                               <div class="col-md-6">
                                    <img src="{{ asset('img/product/'.$row->img) }}" alt="...">
                                <div class="">{{ $row->name }}</div>
                                <h3 class="price text-danger">{{ number_format($row->price) }}</h3>
                                <h5>Mô tả sản phẩm</h5>
                                <p>{{ $row->metadesc}}</p>
                                <div class="form-inline">
                                  <input type="number" min="1" value="1" class="form-control" >
                                  <button type="button" class="btn btn-sm btn-success">Thêm Vào Giỏ Hàng</button>
                                </div>
                               </div>

                        </div>
                        <div class="row product-detail">
                                <p>{{ $row->detail }}</p>
                        </div>
                    {{--  <--!!Nếu không có sản phẩm cùn loại-->  --}}
                    @if (count($listother))
                    <h3>Sản phẩm cùng loại</h3>
                    <div class ="row product-other">
                        @foreach ($listother as $item)
                        <div class="col-md-3">
                                <div class="card w-100">
                                    <a href="{{ url($item->slug) }}">
                                        <img src="{{ asset('img/product/'.$item->img) }}" class="card-img-top" alt="...">
                                    </a>
                                        <div class="card-body">
                                                <a href="{{ url($item->slug) }}">
                                                    <h5 class="card-title">{{$item->name }}</h5>
                                                </a>
                                            <h5 class="card-price">{{ number_format($item->price) }}</h5>
                                            <p class="card-text"></p>
                                            <a href="#" class="form-control btn btn-primary">Đặt Mua</a>
                                        </div>
                                        </div>
                                    </div>
                        @endforeach
                    @endif

                        </div>
                     </div>
                </div>
                {{-- <!!--Products--> --}}
        </section>
        @endsection

