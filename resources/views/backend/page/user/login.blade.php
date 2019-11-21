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
