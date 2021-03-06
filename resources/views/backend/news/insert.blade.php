@extends('layouts.layoutadmin')
@section('title','Quản Lý Tin Tức')
@section('content')
@section('session_header')

{{--  <--!Vùng dataTables --!>  --}}
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css') }}" >

@endsection

<section class="clearfix maincontent">
        <form  action="{{ route('news_postinsert') }}"  method="post" role="form" enctype="multipart/form-data">
                 {{ csrf_field() }}
    <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                        <strong class="text-danger">
                            Thêm Tin Tức
                        </strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-success" ><i class="far fa-save"></i>Lưu[Thêm]</button>

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
                            <label>Tên Bài Viết</label>
                            <input name="title" class="form-control" type="text" value="{{ old('name') }}">
                            @if ($errors->has('name'))

                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                                <label>Chi Tiết Bài Viết </label>
                               <textarea name="detail" id="editor1" class="form-control" rows="6" value="{{ old('detail') }}" ></textarea>
                        </div>
                        <div class="form-group">
                                <label>Mô Tả Seo</label>
                                <textarea name="metadesc"  class="form-control" rows="2" value="{{ old('metadesc') }}" ></textarea>
                        </div>
                        <div class="form-group">
                                <label>Từ Khóa Seo</label>
                                <textarea name="metakey"  class="form-control" rows="2" value="{{ old('metakey') }}" ></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                            <div class="form-group">
                                <label>Loại Bài Viết</label>
                                <select name="topid" class="form-control">
                                    <option value="">Chọn Loại Bài Viết</option>
                                    @foreach ($listcat as $idcat)
                                    <option value="{{ $idcat->id }}">{{ $idcat->name }}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('catid'))
                                <span class="text-danger">{{ $errors->first('catid') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                    <label>Trạng Thái</label>
                                    <select name="status" class="form-control">
                                        <option value="1"> Hiện</option>
                                        <option value="2">Chưa Hiện</option>
                                    </select>
                                </div>
                                <div class
                            <div class="form-group">
                                    <label>Hình Ảnh</label>
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
<script>CKEDITOR.replace('editor1'); </script>
</script>
<script> CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } ); </script>


@endsection


