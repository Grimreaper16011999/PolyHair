<?php
if (isset($_GET['msg'])) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
$list_nv = slider_select_All();

?>
<h3 class="text-center text-uppercase m-2">Quản lý Slider</h3>
<a href="index.php?add" class="btn btn-success mb-4">Thêm mới Slider</a>

<form action="" method="post">
    <table class="table table-hover table-bordered table-light">
        <thead style="color: red;">
            <tr>
                <th>
                    <input type="checkbox" id="selectall">
                </th>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tiêu đề</th>
                <th>Chi tiết</th>
                <th>Trạng thái</th>
                <th colspan="2" class="text-center">Tác vụ</th>
            </tr>

        </thead>
        <?php
        foreach ($list_nv as $key => $row) : ?>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" name="ma_anh[]" id="" value="<?= $row['ma_anh'] ?>" class="checkbox1">
                    </td>
                    <td><?= ++$key ?></td>
                    <td>
                        <img src="<?= $IMG_URL ?>/slider/<?= $row['hinh_anh'] ?>" alt="" width="400px">
                    </td>
                    <td><?= $row['tieu_de'] ?></td>
                    <td><?= $row['noi_dung'] ?></td>
                    <td>
                        <?php
                            if($row['trang_thai'] == 1){
                                echo "Bật";
                            }
                            else{
                                echo "Tắt";
                            }
                        ?>
                    </td>
                    <td class="text-center">
                        <a href="index.php?edit&id=<?= $row['ma_anh'] ?>" class="btn btn-warning"><i class="far fa-edit" style="color: #fff;"></i></a>
                        <a onclick="return confirm('Bạn có chắc muốn xoá không?')" class="btn btn-danger" href="index.php?delete&ma_anh=<?= $row['ma_anh'] ?>"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
    <button onclick="return confirm('Bạn có chắc muốn xoá không?')" type="submit" class="btn btn-danger" name="delete">Xoá mục đã chọn</button>
</form>

<script>
    $(document).ready(function() {

        $("#selectall").change(function() {
            $(".checkbox1").prop('checked', $(this).prop("checked"));
        });
    });
</script>