@extends('layouts.layoutadmin')
@section('title','Quản Lý Tin Tức')
@section('content')
@section('session_header')

{{--  <--!Vùng dataTables --!>  --}}
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css') }}" >


@endsection



<section class="clearfix maincontent">
    <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                        <strong class="text-danger">
                            Danh Sách Tin Tức Thùng Rác
                        </strong>
                        </div>
                        <div class="col-md-6 text-right">

                            <a class="btn btn-sm btn-danger" href="{{ route('index_news') }}"><i class="fas fa-sign-out-alt"></i>Quay Lại

                            </a>
                        </div>

                    </div>

                </div>

            </div>
            <div class="card-body">
                @includeIf('backend.modules.message')
               <table id="myTable" class="table table-hover table-striped">
                   <thead>
                       <tr>
                            <th>Tên Tin Tức</th>
                            <th>Hình Ảnh</th>
                            <th>Loại Tin Tức</th>
                            <th>Ngày Đăng</th>
                            <th>Chức Năng</th>
                            <th>Id</th>
                       </tr>

                   </thead>
                   <tbody>
                       @foreach ($list as $row)
                           <tr>

                               <td>{{ $row->title }}</td>
                               <td><img class="img-fluid img-thumbnail" src="{{ asset('img/news/'.$row->img) }}"></td>
                               <td> {{ $row->nametitle }}</td>
                               <td class="text-info">{{ $row->created_at }}</td>
                               <td>
                                   {{--  @if ($row->status==1)
                                   <a class="btn btn-sm btn-success" href="{{ route('product_status',['id'=>$row->id]) }}"><i class="fas fa-toggle-on"></i></a>
                                   @else

                                   <a class="btn btn-sm btn-danger" href="{{ route('product_status',['id'=>$row->id]) }}"><i class="fas fa-toggle-off"></i></a>

                                   @endif  --}}

                                   <a class="btn btn-sm btn-info" href="{{ route('news_retrash',['id'=>$row->id]) }}"><i class="fas fa-undo-alt"></i></a>
                                   <a class="btn btn-sm btn-danger" href="{{ route('news_delete',['id'=>$row->id]) }}"><i class="fas fa-trash-alt"></i></a>
                               </td>
                               <td>{{ $row->id }}</td>
                           </tr>
                       @endforeach
                   </tbody>
               </table>
            </div>
            <div class="card-footer text-muted">

            </div>
    </div>
</section>
@endsection
@section('session_footer')

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>


@endsection


