<h3 class="text-center text-uppercase m-2">Thêm mới CT khuyến mãi</h3>

<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Mã khyến mãi</label>
                <input type="text" class="form-control" placeholder="Auto" readonly name="ma_khuyen_mai" value="<?= isset($ma_khuyen_mai) ? $ma_khuyen_mai : '' ?>">
            </div>
            <div class="form-group">
                <label for="name">Tên khuyến mãi</label>
                <input type="text" class="form-control" placeholder="Tên khuyến mãi" name="ten_khuyen_mai" value="<?= isset($ten_khuyen_mai) ? $ten_khuyen_mai : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['ten_khuyen_mai']) ? $errors['ten_khuyen_mai'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Số lượng</label>
                <input type="text" class="form-control" placeholder="số lượng" name="so_luong" value="<?= isset($so_luong) ? $so_luong : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['so_luong']) ? $errors['so_luong'] : '' ?></p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Giá khuyến mãi</label>
                <input type="text" class="form-control" placeholder="? %" name="gia" value="<?= isset($gia) ? $gia : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['gia']) ? $errors['gia'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Hình ảnh</label>
                <input type="file" class="form-control" name="hinh">
                <p class="errors" style="color: red;"><?= isset($errors['hinh_anh']) ? $errors['hinh_anh'] : '' ?></p>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">Chi tiết</label>
                <span class="errors" style="color: red;">
                    <textarea class="form-control" name="chi_tiet" id="" cols="30" rows="10"></textarea>
                    <?= isset($errors['chi_tiet']) ? $errors['chi_tiet'] : '' ?>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="btn_insert">Thêm</button>
    <a href="index.php?list" class="btn btn-primary">List</a>
    <button type="submit" class="btn btn-warning" name="reset">Nhập lại</button>
</form>