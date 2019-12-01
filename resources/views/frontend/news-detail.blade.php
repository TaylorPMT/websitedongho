{{--  <!!--view-->  --}}
@php
    use Illuminate\Support\Carbon;

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
            <div class="row news">
                    <div class="card mb-3">
                            <img src="{{ asset('img/news/'.$row->img) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{ $row->title }}</h5>
                              <p class="card-text">{{ $row->detail}}</p>
                              <p class="card-text"><small class="text-muted">@php
                                  $datetime=$row->created_at;
                                  echo $datetime->format('l jS \\of F Y h:i:s A');
                              @endphp</small></p>
                            </div>
                    </div>
                        
            </div>
            </div>  
                {{-- <!!--Products--> --}}
        </section>
        @endsection

