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
                            <h3 class="title text-center">Liên hệ
                                </h3>
                        <div class="row justify-content-md-center">

                            <div class="col">
                                <p class="">Bình Luận Về Dịch Vụ</p>
                                <div id="fb-root"></div>
                                <div class="fb-comments" data-href="https://www.facebook.com/1424622421183507/photos/a.1424694071176342/1424694024509680/?type=3&amp;theater" data-width="" data-numposts="5"></div>
                            </div>
                            <div class="col">
                                    <form>
                                            <div class="form-group">
                                                    <label for="formGroupExampleInput">Ý Kiến Góp Ý</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                                  </div>
                                            <div class="form-group">
                                              <label for="formGroupExampleInput">Họ Và Tên</label>
                                              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                            </div>
                                            <div class="form-group">
                                              <label for="formGroupExampleInput2">Email</label>
                                              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                                            </div>
                                            <div class="form-group">
                                                    <label for="formGroupExampleInput">Số Điện Thoại</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="formGroupExampleInput2">Nội Dung</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input" >
                                                  </div>
                                    </form>
                            </div>
                        </div>
                        </div>
                </section>










        </section>
        @endsection
        @section('name')

        @endsection
