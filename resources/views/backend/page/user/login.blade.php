<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('postlogin') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="my-input">Tên Đăng Nhập</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="my-input">Mật Khẩu</label>
            <input type="text" class="form-control" name="password">
        </div>
        <div class="form-group">
            <button type="submit">Đăng Nhập</button>
        </div>
    </form>
</body>
</html>

