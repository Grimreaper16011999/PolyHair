<?php
$coso = kg_select_All();

?>
<h3 class="text-center text-uppercase m-2">Thêm mới</h3>
<div class="row">
    <div class="col col-md-6">
        <form id="demoForm" action="" method="post" enctype="multipart/form-data" class=" m-0 p-0">
            <div class="form-group">
                <label for="name">Mã khung giờ</label>
                <input type="text" class="form-control" placeholder="Auto" readonly name="ma_khung_gio" value="<?= isset($ma_khung_gio) ? $ma_khung_gio : '' ?>"><br>
                <label for="name">Thời gian</label>
                <input type="text" class="form-control" placeholder="ex: 7h00 - 8h00" name="thoi_gian" value="<?= isset($thoi_gian) ? $thoi_gian : '' ?>">
                <span class="errors" style="color:red"><?= isset($errors['thoi_gian']) ? $errors['thoi_gian'] : '' ?></span><br>
            </div>
            <button type="submit" class="btn btn-success" name="btn_insert">Thêm</button>
            <a href="index.php?list" class="btn btn-primary">List</a>
            <button type="submit" class="btn btn-warning" name="reset">Nhập lại</button>
        </form>
    </div>
    <div class="col col-md-6 mt-2">
        <form action="" method="post">
            <table class="table table-hover table-bordered table-light">
                <thead style="color: red;">
                    <tr>
                        <th>STT</th>
                        <th>Khung giờ</th>
                        <!-- <th colspan="2" class="text-center">Tác vụ</th> -->
                    </tr>

                </thead>
                <?php
                foreach ($coso as $key => $row) : ?>
                    <tbody>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $row['thoi_gian']; ?></td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </form>
    </div>
</div>