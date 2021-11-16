<?php
    $data = coso_select_by_id($_GET['id']);
?>
<h3 class="text-center text-uppercase m-2">sửa dữ liệu cơ sở</h3>

<form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="name">Mã cơ sở</label>
            <input type="text" class="form-control" placeholder="Auto" readonly name="ma_co_so" value="<?=$data['ma_co_so']?>"><br>
            <label for="name">Địa chỉ</label>
            <input type="text" class="form-control" name="dia_chi" value="<?=$data['dia_chi']?>">
            <span class="errors" style="color:red"><?= isset($errors['dia_chi']) ? $errors['dia_chi'] : '' ?></span><br>
        </div>
        <div class="form-group col-md-6">
            <label for="name">Tên cơ sở</label>
            <input type="text" class="form-control" name="ten_co_so" value="<?=$data['ten_co_so']?>">
            <span class="errors" style="color:red"><?= isset($errors['ten_co_so']) ? $errors['ten_co_so'] : '' ?></span><br>
            <label for="name">Số điện thoại</label>
            <input type="text" class="form-control" name="so_dien_thoai" value="<?=$data['so_dien_thoai']?>">
            <span class="errors" style="color:red"><?= isset($errors['so_dien_thoai']) ? $errors['so_dien_thoai'] : '' ?></span><br>
        </div>
        <div class="form-group">
            <label for="name">URL Google Map</label>
            <input type="text" class="form-control" name="url" value="<?=$data['url']?>">
            <span class="errors" style="color:red"><?= isset($errors['url']) ? $errors['url'] : '' ?></span><br>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="btn_edit">Sửa</button>
    <a href="index.php?list" class="btn btn-primary">Danh sách các cơ sở</a>
</form>
