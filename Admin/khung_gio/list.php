<?php
$coso = kg_select_All();
?>
<?php
    if(isset($_GET['msg'])){
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
?>
<h3 class="text-center text-uppercase m-2">Quản trị khung giờ</h3>
<a href="index.php?add" class="btn btn-success mb-4">Thêm mới</a>
<form action="" method="post">
    <table class="table table-hover table-bordered table-light">
        <thead style="color: red;">
            <tr>
                <th>
                    <input type="checkbox" id="selectall">
                </th>
                <th>STT</th>
                <th>Khung giờ</th>
                <th colspan="2" class="text-center">Tác vụ</th>
            </tr>

        </thead>
        <?php
        foreach ($coso as $key => $row) : ?>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" name="ma_khung_gio[]" id="" value="<?= $row['ma_khung_gio'] ?>" class="checkbox1">
                    </td>
                    <td><?= ++$key ?></td>
                    <td><?= $row['thoi_gian']; ?></td>
                    <td class="text-center">
                        <a href="index.php?edit&id=<?=$row['ma_khung_gio']?>" class="btn btn-warning"><i class="far fa-edit" style="color: #fff;"></i></a>
                        <a onclick="return confirm('Bạn có chắc muốn xoá không?')" class="btn btn-danger" href="index.php?delete&ma_khung_gio=<?= $row['ma_khung_gio'] ?>"><i class="far fa-trash-alt"></i></a>
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