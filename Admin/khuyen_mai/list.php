<?php
if(isset($_GET['msg'])){
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

try {
    $limit = 4;
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    if ($page <= 0) {
        $page = 1;
    }
    $firstIndex = ($page - 1) * $limit;

    $list_nv = km_select_All_limit($firstIndex, $limit);
    // Phân trang lấy số trang 
    $sql = "SELECT count(ma_khuyen_mai) as total FROM khuyen_mai";
    $countResult = pdo_query_one($sql);
    $count = $countResult['total'];
    $number = ceil($count / $limit);
} catch (PDOException $e) {
    die($e->getMessage());
}

?>
<h3 class="text-center text-uppercase m-2">CT khuyến mãi</h3>
<a href="index.php?add" class="btn btn-success mb-4">Thêm mới ct khuyến mãi</a>

<form action="" method="post">
    <table class="table table-hover table-bordered table-light">
        <thead style="color: red;">
            <tr>
                <th>
                    <input type="checkbox" id="selectall">
                </th>
                <th>STT</th>
                <th>Tên khuyến mãi</th>
                <th>Hình ảnh</th>
                <th>Giá(%)</th>
                <th>Số lượng</th>
                <th colspan="2" class="text-center">Tác vụ</th>
            </tr>

        </thead>
        <?php
        foreach ($list_nv as $key => $row) : ?>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" name="ma_khuyen_mai[]" id="" value="<?= $row['ma_khuyen_mai'] ?>" class="checkbox1">
                    </td>
                    <td><?= ++$key ?></td>
                    <td><?= $row['ten_khuyen_mai'] ?></td>
                    <td>
                        <img src="<?= $IMG_URL ?>/khuyenmai/<?= $row['hinh_anh'] ?>" alt="" width="80px">
                    </td>
                    <td><?= $row['gia'] ?></td>
                    <td><?= $row['so_luong'] ?></td>
                    <td class="text-center">
                        <a href="index.php?edit&id=<?= $row['ma_khuyen_mai'] ?>" class="btn btn-warning"><i class="far fa-edit" style="color: #fff;"></i></a>
                        <a onclick="return confirm('Bạn có chắc muốn xoá không?')" class="btn btn-danger" href="index.php?delete&ma_khuyen_mai=<?= $row['ma_khuyen_mai'] ?>"><i class="far fa-trash-alt"></i></a>
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