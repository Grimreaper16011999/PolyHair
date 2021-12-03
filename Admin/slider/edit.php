<?php
$slid = slider_select_by_id($_GET['id']);

?>

<h3 class="text-center text-uppercase m-2">Thêm mới Slider</h3>
<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Mã ảnh</label>
                <input type="text" class="form-control" placeholder="Auto" readonly name="ma_anh" value="<?= $slid['ma_anh'] ?>">
            </div>

            <div class="form-group">
                <img class="mt-4" src="<?= $IMG_URL ?>/slider/<?= $slid['hinh_anh'] ?>" alt="" width="100%">

                <label for="name">Hình ảnh</label>
                <input type="file" class="form-control" name="hinh">
                <p class="errors" style="color: red;"><?= isset($errors['hinh_anh']) ? $errors['hinh_anh'] : '' ?></p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Tiêu đề</label>
                <input type="text" class="form-control" placeholder="Tiêu đề" name="tieu_de" value="<?= $slid['tieu_de'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['tieu_de']) ? $errors['tieu_de'] : '' ?></p>
            </div>
            <div class="form-group">
                <label for="name">Nội dung</label>
                <input type="text" class="form-control" placeholder="Nội dung" name="noi_dung" value="<?= $slid['noi_dung'] ?>">
                <p class="errors" style="color: red;"><?= isset($errors['noi_dung']) ? $errors['noi_dung'] : '' ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Trạng thái</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trang_thai" value="1" <?=($slid['trang_thai'] == 1)?'checked':'' ?>>
                <label class="form-check-label" for="trang_thai2" style="color: blue;">
                    Bật
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trang_thai" value="0" <?=($slid['trang_thai'] == 0)?'checked':'' ?>>
                <label class="form-check-label" for="trang_thai2" style="color: red;">
                    Tắt
                </label>
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-success" name="btn_edit">Sửa</button>
    <a href="index.php?list" class="btn btn-primary">List</a>
</form>