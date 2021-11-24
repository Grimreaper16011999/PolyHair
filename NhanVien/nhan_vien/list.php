<?php
if (isset($_GET['msg'])) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
$nv = nv_select_by_id($_SESSION['id_nhanvien']);
?>
<h3 class="text-center text-uppercase m-2">Quản trị Nhân viên</h3>
<!-- <a href="index.php?add" class="btn btn-success mb-4">Thêm mới nhân viên</a> -->

<form action="" method="post">
    <table class="table table-hover table-bordered table-light">
        <thead style="color: red;">
            <tr>
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Tên nhân viên</th>
                <th>Hình ảnh</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Tên cơ sở</th>
                <th colspan="2" class="text-center">Tác vụ</th>
            </tr>

        </thead>

        <tbody>
            <tr>
                <td><?= $nv['tai_khoan'] ?></td>
                <td><?= $nv['mat_khau'] ?></td>
                <td><?= $nv['ten_nhan_vien'] ?></td>
                <td>
                    <img src="<?= $IMG_URL ?>/nhanvien/<?= $nv['hinh_anh'] ?>" alt="" width="100px">
                </td>
                <td><?= $nv['email'] ?></td>
                <td><?= ($nv['vai_tro'] == 1) ? 'Quản trị viên' : 'Nhân viên' ?></td>
                <td>
                    <?= coso_select_by_id($nv['ma_co_so'])['ten_co_so'] ?>
                </td>
                <td class="text-center">
                    <a href="index.php?edit&id=<?= $nv['ma_nhan_vien'] ?>" class="btn btn-warning"><i class="far fa-edit" style="color: #fff;"></i></a>
                    <!-- <a onclick="return confirm('Bạn có chắc muốn xoá không?')" class="btn btn-danger" href="index.php?delete&ma_nhan_vien=<?= $nv['ma_nhan_vien'] ?>"><i class="far fa-trash-alt"></i></a> -->
                </td>
            </tr>
        </tbody>
    </table>
    <!-- <button onclick="return confirm('Bạn có chắc muốn xoá không?')" type="submit" class="btn btn-danger" name="delete">Xoá mục đã chọn</button> -->
</form>