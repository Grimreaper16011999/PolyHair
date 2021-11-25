<h3 class="text-center text-uppercase m-2">Thêm mới nhân viên</h3>

<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Mã nhân viên</label>
                <input type="text" class="form-control" placeholder="Auto" readonly name="ma_nhan_vien" value="<?= isset($ma_nhan_vien) ? $ma_nhan_vien : '' ?>">
            </div>

            <div class="form-group">
                <label for="name">Hình ảnh</label>
                <input type="file" class="form-control" name="hinh">
                <p class="errors" style="color: red;"><?= isset($errors['hinh_anh']) ? $errors['hinh_anh'] : '' ?></p>
            </div>

            <div class="form-group">
                <label for="name">Tài khoản</label>
                <input type="text" class="form-control" placeholder="Username" name="tai_khoan" value="<?= isset($tai_khoan) ? $tai_khoan : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['tai_khoan']) ? $errors['tai_khoan'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Mật khẩu</label>
                <input type="password" class="form-control" placeholder="Password" name="mat_khau" value="<?= isset($mat_khau) ? $mat_khau : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['mat_khau']) ? $errors['mat_khau'] : '' ?></p>
            </div>
            <div class="form-group" style="display: none;">
                <label for="name">Vai trò</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="vai_tro" value="0" checked>
                    <label class="form-check-label" for="trang_thai2" style="color: blue;">
                        Nhân viên
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Tên nhân viên</label>
                <input type="text" class="form-control" placeholder="Tên nhân viên" name="ten_nhan_vien" value="<?= isset($ten_nhan_vien) ? $ten_nhan_vien : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['ten_nhan_vien']) ? $errors['ten_nhan_vien'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" require class="form-control" placeholder="Email" name="email" value="<?= isset($email) ? $email : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['email']) ? $errors['email'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="category">Cơ sở</label>
                <select class="form-control" name="ma_co_so">
                    <?php
                    // lấy danh sách cơ sở
                    $categoryList = coso_select_All();
                    foreach ($categoryList as $item) {
                        echo '<option value="' . $item['ma_co_so'] . '">' . $item['ten_co_so'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="btn_insert">Thêm</button>
    <a href="index.php?list" class="btn btn-primary">Danh sách nhân viên</a>
    <button type="submit" class="btn btn-warning" name="reset">Nhập lại</button>
</form>