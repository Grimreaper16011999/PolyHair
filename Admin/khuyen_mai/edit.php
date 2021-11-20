<?php
$km = km_select_by_id($_GET['id']);
?>
<h3 class="text-center text-uppercase m-2">Update CT khuyến mãi</h3>

<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Mã khyến mãi</label>
                <input type="text" class="form-control" placeholder="Auto" readonly name="ma_khuyen_mai" value="<?= $km['ma_khuyen_mai'] ?>">
            </div>
            <div class="form-group">
                <label for="name">Tên khuyến mãi</label>
                <input type="text" class="form-control" placeholder="Tên khuyến mãi" name="ten_khuyen_mai" value="<?= $km['ten_khuyen_mai'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['ten_khuyen_mai']) ? $errors['ten_khuyen_mai'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Số lượng</label>
                <input type="text" class="form-control" placeholder="số lượng" name="so_luong" value="<?= $km['so_luong'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['so_luong']) ? $errors['so_luong'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Ngày hết han</label>
                <input type="date" class="form-control" name="ngay_het_han" value="<?= $km['ngay_het_han'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['ngay_het_han']) ? $errors['ngay_het_han'] : '' ?></p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Giá khuyến mãi</label>
                <input type="text" class="form-control" placeholder="? %" name="gia" value="<?= $km['gia'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['gia']) ? $errors['gia'] : '' ?></p>
            </div>
            <img class="mt-4" src="<?= $IMG_URL ?>/khuyenmai/<?= $km['hinh_anh'] ?>" alt="" width="200px">
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
                    <textarea class="form-control" name="chi_tiet" id="summernote" cols="30" rows="10"><?= $km['chi_tiet'] ?></textarea>
                    <?= isset($errors['chi_tiet']) ? $errors['chi_tiet'] : '' ?>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="btn_edit">Sửa</button>
    <a href="index.php?list" class="btn btn-primary">List</a>
</form>