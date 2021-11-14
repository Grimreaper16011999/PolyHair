<div class="container p-4">
    <h3 class="text-center">Đăng ký thành viên</h3>
    <form class="row" action="" method="post" enctype="multipart/form-data">
        <div class="col-3"></div>
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <label for="username">Số điện thoại</label>
                <input type="text" class="form-control" name="ten_tk" value="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" name="mat_khau" value="">
            </div>
            <div class="form-group">
                <label for="password">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" name="re_mat_khau" value="">
            </div>
            <button type="submit" class="col-12 mt-2 btn btn-success" name="btn_insert">Đăng kí</button>
        </div>
        <input name="vai_tro" value="0" type="hidden">
        <input name="trang_thai" value="0" type="hidden">
    </form>
</div>