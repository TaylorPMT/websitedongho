@extends('layouts.layoutadmin')
@section('title','Quản Lý Sản Phẩm')
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
                            Quản lý Danh Sách Tin Tức
                        </strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-sm btn-success" href="{{ route('') }}"><i class="fas fa-plus"> Thêm Danh Sách Tin Tức</i> </a>
                             <a class="btn btn-sm btn-danger" href="{{ route('category_deltrash') }}"><i class="fas fa-trash-alt">Thùng Rác</i> 

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


                            <th>Ngày Đăng</th>
                            <th>Chức Năng</th>
                           
                            <th>Loại Tin Tức</th>
                       </tr>

                   </thead>
                   <tbody>
                       @foreach ($list as $row)
                           <tr>

                               <td>{{ $row->title }}</td>


                               <td class="text-info">{{ $row->created_at }}</td>
                               <td>
                                   @if ($row->status==1)
                                   <a class="btn btn-sm btn-success" href="{{ route('category_status',['id'=>$row->id]) }}"><i class="fas fa-toggle-on"></i></a>
                                   @else

                                   <a class="btn btn-sm btn-danger" href="{{ route('category_updatestatus',['id'=>$row->id]) }}"><i class="fas fa-toggle-off"></i></a>

                                   @endif

                                   <a class="btn btn-sm btn-info" href="{{ route('category_getupdate',['id'=>$row->id]) }}"><i class="far fa-edit"></i></a>
                                   <a class="btn btn-sm btn-danger" href="{{ route('category_deltrash',['id'=>$row->id]) }}"><i class="fas fa-trash-alt"></i></a>
                               </td>
                               
                               <td>{{ $row->topid }}</td>
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


