<?php
$nv = nv_select_by_id($_GET['id']);
?>
<h3 class="text-center text-uppercase m-2">Update nhân viên</h3>

<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Mã nhân viên</label>
                <input type="text" class="form-control" placeholder="Auto" readonly name="ma_nhan_vien" value="<?= $nv['ma_nhan_vien'] ?>">
            </div>
            <div class="form-group">
                <label for="name">Tên nhân viên</label>
                <input type="text" class="form-control" placeholder="Tên nhân viên" name="ten_nhan_vien" value="<?= $nv['ten_nhan_vien'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['ten_nhan_vien']) ? $errors['ten_nhan_vien'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Thông tin</label>
                <input type="text" class="form-control" placeholder="Thông tin" name="thong_tin" value="<?= $nv['thong_tin'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['thong_tin']) ? $errors['thong_tin'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="category">Cơ sở</label>
                <select class="form-control" name="ma_co_so">
                    <?php
                    // lấy danh sách cơ sở
                    $categoryList = coso_select_All();
                    foreach ($categoryList as $item) {
                        if ($item['ma_co_so'] == $nv['ma_co_so']) {
                            echo '<option selected value="' . $item['ma_co_so'] . '">' . $item['ten_co_so'] . '</option>';
                        } else {
                            echo '<option value="' . $item['ma_co_so'] . '">' . $item['ten_co_so'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Trạng thái</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="trang_thai" value="1" <?=($nv['trang_thai']==1)?'checked':''?>>
                    <label class="form-check-label" for="trang_thai1" style="color: green;">
                        On
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="trang_thai" value="0" <?=($nv['trang_thai']==0)?'checked':''?>>
                    <label class="form-check-label" for="trang_thai2" style="color: red;">
                        Off
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <img class="mt-4" src="<?= $IMG_URL ?>/nhanvien/<?= $nv['hinh_anh'] ?>" alt="" width="100%">
            <div class="form-group">
                <label for="name">Hình ảnh</label>
                <input type="file" class="form-control" name="hinh">
                <p class="errors" style="color: red;"><?= isset($errors['hinh_anh']) ? $errors['hinh_anh'] : '' ?></p>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="btn_edit">Sửa</button>
    <a href="index.php?list" class="btn btn-primary">Danh sách nhân viên</a>
</form>