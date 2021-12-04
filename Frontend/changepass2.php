
<div class="m-5 row">
    <h3 class="text-center text-uppercase">Đổi mật khẩu</h3>
    <div class="col-sm-3">
    </div>
    <form action="" method="post" class="col-sm-6">
        <div class="form-group">
            <label for="">Mật khẩu mới</label>
            <input type="password" class="form-control" name="mat_khau" value="<?= isset($mat_khau) ? $mat_khau : '' ?>">
            <span class="error" style="color: red;"><?= isset($errors['mat_khau']) ? $errors['mat_khau'] : '' ?></span>
        </div>
        <div class="form-group">
            <label for="password">Xác nhận mật khẩu mới</label>
            <input type="password" class="form-control" name="re_mat_khau" value="<?= isset($re_mat_khau) ? $re_mat_khau : '' ?>">
            <span class="error" style="color: red;"><?= isset($errors['re_pass']) ? $errors['re_pass'] : '' ?></span>
        </div>
        <button class="btn btn-success mt-2" name="btn-change_pass">Đổi mật khẩu</button>
    </form>
</div>