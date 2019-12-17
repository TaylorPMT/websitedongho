

@extends('layouts.layoutsite')
@section('session-header')
    
@endsection
@section('content')
    


    
    <form action="{{ route('post_regis') }}" method="POST">
        @csrf()
    <div class="form-group">
        <label for="name"> Họ và Tên</label>
        <input type="text" class="form-control" name="name">
    </div>

        <div class="form-group">
            <label for="username"> Tên Đăng Nhập</label>
            <input type="text" class="form-control" name="username">
        </div>
    
    <div class="form-group">
        <label for="password"> Password</label>
        <input type="password" class="form-control" name="password">
    </div>
 
    

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="phone">Số Điện Thoại</label>
        <input type="number" class="form-control" name="phone">
    </div>

    <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="nam">Nam
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="nu">Nữ
        </label>
      </div>

     
     
    <div class="form-group">
        @includeIf('backend.modules.message')
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-primary"  >
        </div>
    </div>

</form>

    
        
    @endsection
