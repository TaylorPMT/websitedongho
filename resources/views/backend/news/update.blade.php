@extends('layouts.layoutadmin')
@section('title','Quản Lý Tin Tức')
@section('content')
@section('session_header')

{{--  <--!Vùng dataTables --!>  --}}
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css') }}" >

@endsection

<section class="clearfix maincontent">
        <form  action="{{ route('news_postupdate',['id'=>$row->id]) }}"  method="post" role="form" enctype="multipart/form-data">
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

                            <a class="btn btn-sm btn-danger" href="{{ route('index_news') }}"><i class="fas fa-sign-out-alt"></i>Quay Lại

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
                            <label>Tên Tin Tức</label>
                            <input name="title" class="form-control" type="text" value="{{ old('name',$row->title) }}">
                            @if ($errors->has('name'))

                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                                <label>Chi Tiết Tin Tức</label>
                               <textarea name="detail" class="form-control" rows="6" id="editor1"  >{{ old('detail',$row->detail) }}</textarea>
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
                                <label>Loại Tin Tức</label>
                                <select name="topid" class="form-control">
                                    <option value="">Chọn Loại Tin Tức</option>
                                    @foreach ($listnews as $idnews)

                                         @if ($row->topid==$idnews->id)
                                    <option selected value="{{ $idnews->id }}">{{ $idnews->name }}</option>
                                         @else
                                      <option value="{{ $idnews->id }}">{{ $idnews->name }}</option>
                                         @endif

                                    @endforeach

                                </select>
                                @if ($errors->has('topid'))
                                <span class="text-danger">{{ $errors->first('topid') }}</span>
                                @endif
                            </div>
                           
                            <div class="form-group">
                                    <label>Trạng Thái</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Xuất Hiện</option>
                                        <option value="2">Chưa Xuất Hiện</option>
                                    </select>
                                </div>
                                <div class
                            <div class="form-group">
                                    <label>Hình Đại Diện</label>
                                    <input name="img" class="form-control" type="file">
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

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('editor1'); </script>
@endsection


