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
