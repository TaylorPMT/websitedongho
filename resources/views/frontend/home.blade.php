{{--  <!!--view-->  --}}
@extends('layouts.layoutsite')
        @section('title','Trang Chủ')


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
                <section class="clearfix inner my-5">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                 <h2 class="title-inner">ĐỒNG HỒ CHÍNH HÃNG CAO CẤP</h2>
                                 <p class="title-inner">Chúng tôi cam kết mang lại những giá trị cao nhất, chế độ hậu mãi tốt nhất & đồng hồ chính hãng cho khách hàng khi đến với WATCHSTORE.com</p>
                            </div>


                        </div>
                        <div class="row">
                                <div class="col">
                                       <div class="watch-des"><Span><i class="fab fa-500px"></i></Span></div>
                                       <p class="sub_watchdes">BẢO HÀNH MÁY VÀ PIN 5 NĂM</p>
                                </div>
                                <div class="col">
                                       <div class="watch-des"><span><i class="fab fa-500px"></i></span></div>
                                       <p class="sub_watchdes">GIẢM NGAY 10% GIÁ CHÍNH HÃNG</p>
                                </div>
                                 <div class="col">
                                    <div class="watch-des"><span><i class="fas fa-hand-holding-usd"></i></span></div>
                                        <p class="sub_watchdes">CHUYỂN HÀNG COD MIỄN PHÍ TOÀN QUỐC</p>
                                </div>
                                <div class="col">
                                        <div class="watch-des"><span><i class="fas fa-backward"></i></span></div>
                                        <p class="sub_watchdes">CHẾ ĐỘ 1 ĐỔI 1 TRONG 7 NGÀY ĐẦU</p>
                                </div>
                                <div class="col">
                                        <div class="watch-des"><span><i class="fas fa-gifts"></i></span></div>

                                    <p class="sub_watchdes">TẶNG KHĂN LAU ĐỒNG HỒ CAO CẤP</p>
                                </div>
                                <div class="col">
                                    <div class="watch-des"><span><i class="fas fa-bookmark"></i></span></div>
                                        <p class="sub_watchdes">THAY DÂY DA GIẢM GIÁ 50%</p>
                                </div>
                            </div>

                    </div>
                </section>
                {{-- <!!--Products--> --}}
                @if (count($listcategory))
                    @foreach ($listcategory as $catid)

                            <h3 class="title-category">{{ $catid->name }} </h3>
                                @includeIf('frontend.home-part',['catid'=>$catid->id])

                    @endforeach
                @endif








        </section>
        @endsection
        @section('name')

        @endsection
