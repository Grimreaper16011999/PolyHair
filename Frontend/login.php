<style>
    a:hover {
        color: red;
    }
</style>
<div class="container pt-4 pb-4">
    <div class="row align-item-center ">
        <div class="col-12 col-xs-6 col-sm-8">
            <img src="../resources/img/baiviet/1.jpg" alt="" width="100%">
        </div>
        <div class="col-12 col-xs-6 col-sm-4 order-0 p-5 mt-2" style="border: 1px solid #ccc;">
            <h4>Đăng nhập tài khoản</h4>
            <form action="index.php?login" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Số điện thoại</label>
                    <input type="username" class="form-control" id="username" name="ten_tai_khoan" value="<?= isset($ten_tai_khoan) ? $ten_tai_khoan : '' ?>">
                    <span style="color: red;"><?= isset($errors['ten_tai_khoan']) ? $errors['ten_tai_khoan'] : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="mat_khau">
                    <span style="color: red;"><?= isset($errors['mat_khau']) ? $errors['mat_khau'] : '' ?></span>
                </div>
                <div class="mb-2">
                    <a href="index.php?forgotpass" style="text-decoration: none;">Quên mật khẩu?</a>
                </div>
                <?php if (isset($error)) : ?>
                    <div style="color: red">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <button type="submit" class="col-12 btn btn-primary" name="btn_DangNhap">Đăng nhập</button>
            </form>
        </div>
    </div>
</div>