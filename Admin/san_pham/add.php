<h3 class="text-center text-uppercase m-2">Thêm mới sản phẩm</h3>
<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Mã sản phẩm</label>
                <input type="text" class="form-control" placeholder="Auto" readonly name="ma_san_pham" value="<?= isset($ma_san_pham) ? $ma_san_pham : '' ?>">
            </div>

            <div class="form-group">
                <label for="name">Hình ảnh</label>
                <input type="file" class="form-control" name="hinh">
                <p class="errors" style="color: red;"><?= isset($errors['hinh_anh']) ? $errors['hinh_anh'] : '' ?></p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" placeholder="Tên sản phẩm" name="ten_san_pham" value="<?= isset($ten_san_pham) ? $ten_san_pham : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['ten_san_pham']) ? $errors['ten_san_pham'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Giá</label>
                <input type="text" class="form-control" placeholder="Giá" name="gia" value="<?= isset($gia) ? $gia : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['gia']) ? $errors['gia'] : '' ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="">Chi tiết</label>
            <textarea class="form-control" name="chi_tiet" id="summernote" cols="30" rows="10"></textarea>
            <span class="errors" style="color: red;"> <?= isset($errors['chi_tiet']) ? $errors['chi_tiet'] : '' ?></span>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="btn_insert">Thêm</button>
    <a href="index.php?list" class="btn btn-primary">List</a>
    <button type="submit" class="btn btn-warning" name="reset">Nhập lại</button>
</form>