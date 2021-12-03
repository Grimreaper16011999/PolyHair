<h3 class="text-center text-uppercase m-2">Thêm mới Slider</h3>
<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Mã ảnh</label>
                <input type="text" class="form-control" placeholder="Auto" readonly name="ma_anh" value="<?= isset($ma_anh) ? $ma_anh : '' ?>">
            </div>

            <div class="form-group">
                <label for="name">Hình ảnh</label>
                <input type="file" class="form-control" name="hinh">
                <p class="errors" style="color: red;"><?= isset($errors['hinh_anh']) ? $errors['hinh_anh'] : '' ?></p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Tiêu đề</label>
                <input type="text" class="form-control" placeholder="Tiêu đề" name="tieu_de" value="<?= isset($tieu_de) ? $tieu_de : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['tieu_de']) ? $errors['tieu_de'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Nội dung</label>
                <input type="text" class="form-control" placeholder="Nội dung" name="noi_dung" value="<?= isset($noi_dung) ? $noi_dung : '' ?>">
                <p class="errors" style="color: red;"><?= isset($errors['noi_dung']) ? $errors['noi_dung'] : '' ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Trạng thái</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trang_thai" value="1" checked>
                <label class="form-check-label" for="trang_thai2" style="color: blue;">
                    Bật
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trang_thai" value="0" >
                <label class="form-check-label" for="trang_thai2" style="color: red;">
                    Tắt
                </label>
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-success" name="btn_insert">Thêm</button>
    <a href="index.php?list" class="btn btn-primary">List</a>
    <button type="submit" class="btn btn-warning" name="reset">Nhập lại</button>
</form>