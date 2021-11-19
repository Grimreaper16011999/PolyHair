<?php
if (isset($_GET['msg'])) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

try {
    $limit = 7;
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    if ($page <= 0) {
        $page = 1;
    }
    $firstIndex = ($page - 1) * $limit;

    $list_nv = bl_select_All_limit($firstIndex, $limit);
    // Phân trang lấy số trang 
    $sql = "SELECT count(ma_binh_luan) as total FROM binh_luan";
    $countResult = pdo_query_one($sql);
    $count = $countResult['total'];
    $number = ceil($count / $limit);
} catch (PDOException $e) {
    die($e->getMessage());
}

?>
<h3 class="text-center text-uppercase m-2">Quản lý bình luận</h3>
<!-- <a href="index.php?add" class="btn btn-success mb-4">Thêm mới bài viết</a> -->

<form action="" method="post">
    <table class="table table-hover table-bordered table-light">
        <thead style="color: red;">
            <tr>
                <th>
                    <input type="checkbox" id="selectall">
                </th>
                <th>STT</th>
                <th>Nội dung</th>
                <th>Tên tài khoản</th>
                <th>Họ tên</th>
                <th>Ngày bình luận</th>
                <th colspan="2" class="text-center">Tác vụ</th>
            </tr>

        </thead>
        <?php
        foreach ($list_nv as $key => $row) : ?>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" name="ma_binh_luan[]" id="" value="<?= $row['ma_binh_luan'] ?>" class="checkbox1">
                    </td>
                    <td><?= ++$key ?></td>
                    <td><?= $row['noi_dung'] ?></td>
                    <td>
                    <?=tk_select_by_id($row['ma_tai_khoan'])['ten_tai_khoan'] ?>
                    </td>
                    <td><?=tk_select_by_id($row['ma_tai_khoan'])['ho_ten'] ?></td>
                    <td><?= $row['ngay_binh_luan'] ?></td>

                    <td class="text-center">
                        <a onclick="return confirm('Bạn có chắc muốn xoá không?')" class="btn btn-danger" href="index.php?delete&ma_binh_luan=<?= $row['ma_binh_luan'] ?>"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
    <button onclick="return confirm('Bạn có chắc muốn xoá không?')" type="submit" class="btn btn-danger" name="delete">Xoá mục đã chọn</button>
</form>
<?php
if ($number > 1) {
?>
    <ul class="pagination justify-content-end">
        <?php
        if ($page > 1) {
            echo ' <li class="page-item"><a href="?page=' . ($page - 1) . '" class="page-link">Previous</a></li>';
        }
        ?>

        <?php
        $avariablePage = [1, $page - 1, $page, $page + 1, $number];
        $isFirst = $isLast = false;
        for ($i = 0; $i < $number; $i++) {
            if (!in_array($i + 1, $avariablePage)) {
                if (!$isFirst && $page > 3) {
                    echo '<li class="page-item"><a href="?page=' . ($page - 2) . '" class="page-link">...</a></li> ';
                    $isFirst = true;
                }
                if (!$isLast && $i > $page) {
                    echo '<li class="page-item"><a href="?page=' . ($page + 2) . '" class="page-link">...</a></li> ';
                    $isLast = true;
                }
                continue;
            }
            if ($page == ($i + 1)) {
                echo '<li class="page-item active"><a href="?page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
            } else {
                echo '<li class="page-item"><a href="?page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
            }
        }
        ?>
        <?php
        if ($page < $number) {
            echo ' <li class="page-item"><a href="?page=' . ($page + 1) . '" class="page-link">Next</a></li>';
        }
        ?>
    </ul>
<?php
}
?>
<script>
    $(document).ready(function() {

        $("#selectall").change(function() {
            $(".checkbox1").prop('checked', $(this).prop("checked"));
        });
    });
</script>