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
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
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
                               Thienwatchstore@gmail.com |  +84.356.581.777
                            </div>
                        </div>
                    </div>
            </section>{{--  <end--topbar-->  --}}
            <section class="clearfix bg-topbar ">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg ">


                        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="
                        padding: 10px;
                        padding-left: 30px;
                    ">
                          <ul class="navbar-nav mr-auto">

                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Quản Lý Sản Phẩm
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ Route('product_index') }}">Danh sách sản phẩm</a>
                                <a class="dropdown-item" href="{{ Route('product_getinsert') }}">Thêm Sản Phẩm </a>
                                <div class="dropdown-divider"></div>

                              </div>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Quản Lý Danh Mục Sản Phẩm
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ Route('index_category') }}">Danh sách Loại sản phẩm</a>
                                  <a class="dropdown-item" href="{{ Route('category_getinsert') }}">Thêm  Loại Sản Phẩm </a>
                                  <div class="dropdown-divider"></div>

                                </div>

                              </li>
                              {{-- tin tuc --}}
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Quản Lý Tin Tức
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ Route('index_news') }}">Danh sách Tin Tức </a>
                                  <a class="dropdown-item" href="{{ Route('news_getinsert') }}">Thêm  Tin Tức</a>
                                  <div class="dropdown-divider"></div>

                                </div>

                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Quản Lý Đơn Hàng
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ Route('index-order') }}">Danh sách Đơn Đặc Hàng</a>

                                  <div class="dropdown-divider"></div>

                                </div>

                            </li>
                              {{-- xoa --}}
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('logout') }}" tabindex="-1" aria-disabled="true">Thoát</a>
                            </li>
                          </ul>

                        </div>
                      </nav>
                </div>
            </section>
        {{--  <!--header--!>  --}}
          @yield('content')
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
                        <div class="title-copyright"> Copyright 2019 © thien.phamminhstu@gmail.com | ThienDev</div>
                    </div>


            </div>
    </section>{{--  <!!--end--coppyright-->  --}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        @yield('session_footer')
  </body>
</html>
