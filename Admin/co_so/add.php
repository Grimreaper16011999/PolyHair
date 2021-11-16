<h3 class="text-center text-uppercase m-2">Thêm mới</h3>

<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="name">Mã cơ sở</label>
            <input type="text" class="form-control" placeholder="Auto" readonly name="ma_co_so" value="<?=isset($ma_co_so)?$ma_co_so:'' ?>"><br>
            <label for="name">Địa chỉ</label>
            <input type="text" class="form-control" placeholder="address" name="dia_chi" value="<?=isset($dia_chi)?$dia_chi:'' ?>">
            <span class="errors" style="color:red"><?= isset($errors['dia_chi']) ? $errors['dia_chi'] : '' ?></span><br>
        </div>
        <div class="form-group col-md-6">
            <label for="name">Tên cơ sở</label>
            <input type="text" class="form-control" placeholder="Tên cơ sỏ" name="ten_co_so" value="<?=isset($ten_co_so)?$ten_co_so:'' ?>">
            <span class="errors" style="color:red"><?= isset($errors['ten_co_so']) ? $errors['ten_co_so'] : '' ?></span><br>
            <label for="name">Số điện thoại</label>
            <input type="text" class="form-control" placeholder="09xxxxxxxx" name="so_dien_thoai" value="<?=isset($so_dien_thoai)?$so_dien_thoai:'' ?>">
            <span class="errors" style="color:red"><?= isset($errors['so_dien_thoai']) ? $errors['so_dien_thoai'] : '' ?></span><br>
        </div>
        <div class="form-group">
            <label for="name">URL Google Map</label>
            <input type="text" class="form-control" placeholder="http:....." name="url" value="<?=isset($url)?$url:'' ?>">
            <span class="errors" style="color:red"><?= isset($errors['url']) ? $errors['url'] : '' ?></span><br>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="btn_insert">Thêm</button>
    <a href="index.php?list" class="btn btn-primary">Danh sách các cơ sở</a>
    <button type="submit" class="btn btn-warning" name="reset">Nhập lại</button>
</form>
