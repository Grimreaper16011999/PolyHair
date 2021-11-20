<?php
$dv = dv_select_by_id($_GET['id']);
?>

<h3 class="text-center text-uppercase m-2">Thêm mới dịch vụ</h3>

<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Mã dịch vụ</label>
                <input type="text" class="form-control" placeholder="Auto" readonly name="ma_dich_vu" value="<?= $dv['ma_dich_vu'] ?>">
            </div>
            <div class="form-group">
                <label for="name">Tên dịch vụ</label>
                <input type="text" class="form-control" placeholder="Tên dịch vụ" name="ten_dich_vu" value="<?= $dv['ten_dich_vu'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['ten_dich_vu']) ? $errors['ten_dich_vu'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Giá dịch vụ</label>
                <input type="text" class="form-control" placeholder="Giá dịch vụ" name="gia" value="<?= $dv['gia'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['gia']) ? $errors['gia'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Khuyến mãi (%)</label>
                <input type="text" class="form-control" placeholder="ex: 10%" name="gia_km" value="<?=$dv['gia_km']?>">
                <p class="errors" style="color: red;"><?= isset($errors['gia_km']) ? $errors['gia_km'] : '' ?></p>
            </div>
        </div>
        <div class="col-sm-6">
        <img class="mt-4" src="<?= $IMG_URL ?>/dichvu/<?= $dv['hinh_anh'] ?>" alt="" width="200px">
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
                    <textarea class="form-control" name="chi_tiet" id="summernote" cols="30" rows="10"><?= $dv['chi_tiet'] ?></textarea>
                    <?= isset($errors['chi_tiet']) ? $errors['chi_tiet'] : '' ?>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="btn_edit">Sửa</button>
    <a href="index.php?list" class="btn btn-primary">Danh sách dịch vụ</a>
</form>