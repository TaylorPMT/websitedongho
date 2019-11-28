<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}"  >
    <link rel="stylesheet" href="{{asset('css/layoutsite.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="clearfix form-login">
        <div class="container">
                <div class="row justify-content-md-center">
    <form action="{{ route('postlogin') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="my-input"><i class="fas fa-users">||</i> Tên Đăng Nhập</label>
            <input type="text" class="form-control" name="username" placeholder="Login">
        </div>
        <div class="form-group">
            <label for="my-input"><i class="fas fa-unlock">||</i> Mật Khẩu</label>
            <input type="text" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button type="submit">Đăng Nhập</button>
        </div>
    </form>
                </div>
        </div>
    </div>
</body>
</html>

