<?php
    $kt =bv_select_by_id($_GET['id'])
?>
<h3 class="text-center text-uppercase m-2">Update kiểu tóc</h3>

<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Mã kiểu tóc</label>
                <input type="text" class="form-control" placeholder="Auto" readonly name="ma_bai_viet" value="<?= $kt['ma_bai_viet'] ?>">
            </div>

            <div class="form-group">
                <img src="<?=$IMG_URL?>/mau_toc/<?=$kt['hinh_anh']?>" alt="" width="100"><br>
                <label for="name">Hình ảnh</label>
                <input type="file" class="form-control" name="hinh">
                <p class="errors" style="color: red;"><?= isset($errors['hinh_anh']) ? $errors['hinh_anh'] : '' ?></p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Tên bài viết</label>
                <input type="text" class="form-control" placeholder="" name="ten_bai_viet" value="<?= $kt['ten_bai_viet'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['ten_bai_viet']) ? $errors['ten_bai_viet'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Mô tả</label>
                <input type="text" class="form-control" placeholder="Mô tả" name="mo_ta" value="<?= $kt['mo_ta'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['mo_ta']) ? $errors['mo_ta'] : '' ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="">Chi tiết</label>
            <textarea class="form-control" name="chi_tiet" id="summernote" cols="30" rows="10"><?= $kt['chi_tiet'] ?></textarea>
            <span class="errors" style="color: red;"> <?= isset($errors['chi_tiet']) ? $errors['chi_tiet'] : '' ?></span>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="btn_edit">Sửa</button>
    <a href="index.php?list" class="btn btn-primary">List</a>
    <!-- <button type="submit" class="btn btn-warning" name="reset">Nhập lại</button> -->
</form>