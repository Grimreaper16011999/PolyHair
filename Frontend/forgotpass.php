<div class="m-5 row">
    <h3 class=" text-center">Quên mật khẩu</h3>
    <div class="col-md-3">
    </div>
    <form action="" method="post" class="col-md-5 m-3 ">
        <div class="form-group">
            <label for="username">Tên tài khoản</label>
            <input type="text" class="form-control" name="ten_tai_khoan" value="<?= isset($ten_tai_khoan) ? $ten_tai_khoan : '' ?>">
            <span class="error" style="color: red;"><?= isset($errors['ten_tai_khoan']) ? $errors['ten_tai_khoan'] : '' ?></span>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="<?= isset($email) ? $email : '' ?>">
            <span class="error" style="color: red;"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
        </div>
        <button type="submit" class="btn btn-success mt-2" name="btn_forgot">Tìm lại mật khẩu</button>
        
       
    </form>
</div>