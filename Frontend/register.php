<div class="container p-4">
    <h3 class="text-center">Đăng ký thành viên</h3>
    <form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Mã tài khoản</label>
                    <input type="text" class="form-control" placeholder="Auto" readonly name="ma_tai_khoan" value="<?= isset($ma_tai_khoan) ? $ma_tai_khoan : '' ?>">
                </div>
                <div class="form-group">
                    <label for="name">Họ tên</label>
                    <input type="text" require class="form-control" placeholder="Họ tên" name="ho_ten" value="<?= isset($ho_ten) ? $ho_ten : '' ?>">
                    <p class="errors" style="color: red;"><?= isset($errors['ho_ten']) ? $errors['ho_ten'] : '' ?></p>
                </div>

                <div class="form-group">
                    <label for="name">Hình ảnh</label>
                    <input type="file" class="form-control" name="hinh">
                    <p class="errors" style="color: red;"><?= isset($errors['hinh_anh']) ? $errors['hinh_anh'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" require class="form-control" placeholder="Email" name="email" value="<?= isset($email) ? $email : '' ?>">
                    <p class="errors" style="color: red;"><?= isset($errors['email']) ? $errors['email'] : '' ?></p>
                </div>
                <div class="form-group" style="display: none;">
                    <label for="name">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="trang_thai" value="1" checked>
                        <label class="form-check-label" for="trang_thai1" style="color: green;">
                            Kích hoạt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="trang_thai" value="0">
                        <label class="form-check-label" for="trang_thai2" style="color: red;">
                            Chưa kích hoạt
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Tên tài khoản</label>
                    <input type="text" class="form-control" placeholder="Tên tài khoản" name="ten_tai_khoan" value="<?= isset($ten_tai_khoan) ? $ten_tai_khoan : '' ?>">
                    <p class="errors" style="color: red;"><?= isset($errors['ten_tai_khoan']) ? $errors['ten_tai_khoan'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="name">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="mat_khau" value="<?= isset($mat_khau) ? $mat_khau : '' ?>">
                    <p class="errors" style="color: red;"><?= isset($errors['mat_khau']) ? $errors['mat_khau'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="name">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" placeholder="xác nhận mật khẩu" name="re_mat_khau" value="<?= isset($re_mat_khau) ? $re_mat_khau : '' ?>">
                    <p class="errors" style="color: red;"><?= isset($errors['re_mat_khau']) ? $errors['re_mat_khau'] : '' ?></p>
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-success" name="btn_insert">Đăng ký</button>
    </form>
</div>