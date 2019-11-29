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
    <link rel="stylesheet" href="{{ asset('fonts/Pacifico.css') }}">

          @yield('session_header')
  </head>
  <body>
         {{--  <!--topbar--!>  --}}
            <section class="clearfix topbar bg-topbar">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                Watch Store
                            </div>
                            <div class="col-md-6 text-right">
                               Thienwatchstore@gmail.com |

                               +84.356.581.777
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
                                        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                                </form>
                        </div>
                        <div class="col-md-3 account-cart">
                          <a href=""><i class="fas fa-shopping-cart"> </i> Giỏ Hàng</a>|
                          <a href="{{ route('loginuser') }}"><i class="fas fa-user"></i>Đăng Nhập</a>
                          @if(Session::has('login') && Session::get('login') == true)
                          @endif
                          <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Xin chào {{ Session::get('name') }} <span class="caret"></span></a>
                            <div class="dropdown-menu">
                                <div>
                                    <a href="{{ Route('dangxuat') }}">Đăng Xuất</a>
                                </div>
                            </div>
                          </div>

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
        </section>{{--  <!--end--menu-->  --}}
        @yield('content'){{--  <!!--main-->  --}}
        {{--  <!--footer-->  --}}
        <section class="clearfix footer border-top my-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">C1</div>
                        <div class="col-md-3">C2</div>
                        <div class="col-md-3">C3</div>
                        <div class="col-md-3">C4</div>
                    </div>


                </div>
        </section>{{--  <!--end--footer-->  --}}
            {{--  <!--footer-->  --}}
            <section class="clearfix footer border-top my-4">
                    <div class="container">
                        <div class="row ft1">
                            <div class="col-md"></div>
                            <div class="col-md">C2</div>
                            <div class="col-md">C3</div>
                            <div class="col-md">C4</div>
                            <div class="col-md">C5</div>
                        </div>


                    </div>
            </section>{{--  <!--end--footer-->  --}}
        {{--  <!!--coppyright-->  --}}
        <section class="clearfix copyright bg-topbar border-top my-3">
                <div class="container">
                    <div class="row">
                        <div class="col-1">
                            <div class="title-copyright">Đồ Án WebSite</div>
                                    <div class="sub-title">
                                    Thành Viên Thực Hiện <br>
                                Nguyễn Anh Nghĩa <br> Phạm Minh Thiện
                                    </div>
                        </div>
                        <div class="col-2">
                            <div class="title-copyright">Information</div>
                                    <div class="sub-title">
                                            <a href="#"><i class="fab fa-facebook-square"></i></a> <br>
                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                    </div>


                        </div>
                        <div class="col-3">
                           <div class="title-copyright">Fanpage</div>
                        </div>

                    </div>


                </div>
        </section>{{--  <!!--end--coppyright-->  --}}
        <section class="bg-topcoppyright border-top">
                <div class="container">
                        <div class="row-1">
                           <div class="title-copyright"> Copyright 2019 © thien.phamminhstu@gmail.com | ThienDeveLoper</div>
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
