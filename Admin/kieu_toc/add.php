<h3 class="text-center text-uppercase m-2">Thêm mới Kiểu tóc</h3>
<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Mã kiểu tóc</label>
                <input type="text" class="form-control" placeholder="Auto" readonly name="ma_kieu_toc" value="<?= isset($ma_kieu_toc) ? $ma_kieu_toc : '' ?>">
            </div>

            <div class="form-group">
                <label for="name">Hình ảnh</label>
                <input type="file" class="form-control" name="hinh">
                <p class="errors" style="color: red;"><?= isset($errors['hinh_anh']) ? $errors['hinh_anh'] : '' ?></p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Tên kiểu tóc</label>
                <input type="text" class="form-control" placeholder="Tên kiểu tóc" name="ten_kieu_toc" value="<?= isset($ten_kieu_toc) ? $ten_kieu_toc : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['ten_kieu_toc']) ? $errors['ten_kieu_toc'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Mô tả</label>
                <input type="text" class="form-control" placeholder="Mô tả" name="mo_ta" value="<?= isset($mo_ta) ? $mo_ta : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['mo_ta']) ? $errors['mo_ta'] : '' ?></p>
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