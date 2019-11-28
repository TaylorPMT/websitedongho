@extends('layouts.layoutadmin')
@section('title','Quản Lý Sản Phẩm')
@section('content')
@section('session_header')

{{--  <--!Vùng dataTables --!>  --}}
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css') }}" >

@endsection

<section class="clearfix maincontent">
        <form  action="{{ route('category_postupdate',['id'=>$row->id]) }}"  method="post" role="form" enctype="multipart/form-data">
                 {{ csrf_field() }}
    <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                        <strong class="text-danger">
                            Thêm Sản Phẩm
                        </strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-success" ><i class="far fa-save"></i>Lưu[Sữa]</button>

                            <a class="btn btn-sm btn-danger" href="{{ route('product_index') }}"><i class="fas fa-sign-out-alt"></i>Quay Lại

                            </a>
                        </div>

                    </div>

                </div>

            </div>
            <div class="card-body">
                @includeIf('backend.modules.message')
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>Tên sản Phẩm</label>
                            <input name="name" class="form-control" type="text" value="{{ old('name',$row->name) }}">
                            @if ($errors->has('name'))

                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                                <label>Mô Tả Seo</label>
                                <textarea name="metadesc" class="form-control" rows="2" >{{ old('metadesc',$row->metadesc) }} </textarea>
                        </div>
                        <div class="form-group">
                                <label>Từ Khóa Seo</label>
                                <textarea name="metakey" class="form-control" rows="2"  >{{ old('metakey',$row->metakey) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">

                            <div class="form-group">
                                    <label>Trạng Thái</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Xuất Bán</option>
                                        <option value="2">Chưa Xuất Bán</option>
                                    </select>
                                </div>

                        </div>
                </div>

            </div>
    </div>
    </div>
</form>

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


