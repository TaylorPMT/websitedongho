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
    <link rel="stylesheet" href="{{ asset('css/all.min.css')"> }}

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
            <section class="clearfix bg-topbar">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg ">


                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('logout') }}" tabindex="-1" aria-disabled="true">Thoát</a>
                            </li>
                          </ul>
                          <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" >Tìm Kiếm</button>
                          </form>
                        </div>
                      </nav>
                </div>
            </section>
        {{--  <!--header--!>  --}}
          @yield('content')
        <section class="clearfix copyright bg-topbar border-top my-3">
                <div class="container">
                    coppyright @
                </div>
        </section>{{--  <!!--end--coppyright-->  --}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        @yield('session_footer')
  </body>
</html>
