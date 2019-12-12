@php

use App\Library\Cart;
@endphp


<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}"  >
    <link rel="stylesheet" href="{{asset('css/layoutsite.css') }}">
    <link rel="stylesheet" href="{{asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/Roboto.css') }}">

          @yield('session_header')
  </head>
  <body>
         {{--  <!--topbar--!>  --}}
            <section class="clearfix topbar bg-topbar">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 title-copyright">
                               <h3>Watch Store</h3>
                            </div>
                            <div class="col-md-6 text-right title-copyright">
                               <h4 class="phone-title" ><i class="fas fa-phone-square-alt" style="color: white"></i>Hotline: 0165.658.1777</h4>
                            </div>
                        </div>
                    </div>
            </section>{{--  <end--topbar-->  --}}

        {{--  <!--header--!>  --}}
        <section class="clearfix header">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-md-3 logo">
                            <img class="img-logo" src="{{ asset('img/logo.png') }}" alt="logo">
                        </div>
                        <div class="col-md-6 search">
                                <form class="form-inline my-2 my-lg-0">
                                        <input class="form-control mr-sm-2 input-seach" type="search" placeholder="Tìm kiếm" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                                </form>
                        </div>

                                {{--  //Dòng này còn sai  --}}
                          {{--  @if(Session::has('login') && Session::get('login') == true)  --}}

                            @if (Session::get('name')!=null)
                          <div class="dropdown" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="user-name">Xin Chào {{ Session::get('name') }}</span> <span class="caret"></span></a>
                            <div class="dropdown-menu">
                                <div>
                                     <a href="{{ Route('cart-view') }}"><i class="fas fa-shopping-cart"></i>
                                 Giỏ Hàng ({{ $cart->total_quanlity}})
                            ({{ number_format($cart->total_price) }})VNĐ </a></div>
                                <div>
                                    <a href="{{ Route('dangxuat') }}">Đăng Xuất</a>
                                </div>
                            </div>
                          </div>
                          @else
                          <div class="col-md-3 account-cart">

                          <a href="{{ route('loginuser') }}"><i class="fas fa-user"></i>Đăng Nhập</a>


                          @endif



                        </div>
                    </div>
                </div>
        </section>{{--  <end--header-->  --}}
        {{--  <!--menu--!>  --}}

        <section class="clearfix mainmenu my-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @includeIf('frontend.sildebar_mainmenu')
                        </div>
                    </div>
                </div>
        </section>

        {{--  <!--end--menu-->  --}}
        @yield('content'){{--  <!!--main-->  --}}
        {{--  <!--footer-->  --}}

     {{--  <!--end--footer-->  --}}
        {{--  <!!--coppyright-->  --}}
        <section class="clearfix copyright bg-topbar border-top my-3" style="margin-bottom: 0 !important">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="title-copyright">Đồ Án WebSite</div>
                                    <div class="sub-title">
                                    Thành Viên Thực Hiện <br>
                                Nguyễn Anh Nghĩa <br> Phạm Minh Thiện
                                    </div>
                        </div>
                        <div class="col">
                            <div class="title-copyright">Information</div>
                                    <div class="sub-title">
                                            <a href="#"><i class="fab fa-facebook-square"></i></a> <br>
                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                    </div>


                        </div>
                        <div class="col">
                           <div class="title-copyright">Fanpage</div>
                                <div class="sub-title">
                                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTh%25E1%25BA%25A3o-D%25C6%25B0%25E1%25BB%25A3c-Tr%25E1%25BB%258B-M%25E1%25BB%25A5n-M%25E1%25BB%2599c-D%25C6%25B0%25C6%25A1ng-Ch%25C3%25A2u-576763146090698%2F&tabs=timeline&width=400&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                </div>
                        </div>

                    </div>


                </div>
        </section>{{--  <!!--end--coppyright-->  --}}
        <section class="clearfix bg-topcoppyright border-top">
                <div class="container">
                        <div class="row-1">
                           <div class="title-copyright"> Copyright 2019 © nguyennghia@gmail.com | NghiaDeveLoper</div>
                        </div>


                </div>
        </section>{{--  <!!--end--coppyright-->  --}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0"></script>
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('editor1'); </script>
        @yield('session_footer')
  </body>
</html>
