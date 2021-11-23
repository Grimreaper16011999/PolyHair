<?php
try {
    $limit = 10;
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
<h3 class="text-center">Trang diễn đàn</h3>
<div class="container mt-5">
    <div class="row">
        <h5>Bình luận</h5>
        <form action="" method="post" class="col-md-12 m-0 p-0 mt-2">
            <input type="text" class="form-control" name="noi_dung" placeholder="nhập bình luận">
            <button type="submit" class="mt-2 btn btn-success" name="btn_binhluan">Bình luận</button>
        </form>
        <?php foreach ($list_nv as $key => $row) : ?>

            <div class="row mt-2 border-bottom ml-0">
                <div class="col-md-1 mt-3">
                    <img class="" style="border-radius: 50%" src="<?= $IMG_URL ?>/taikhoan/<?=tk_select_by_id($row['ma_tai_khoan'])['hinh_anh']?>" width="100%" alt="">
                </div>
                <div class="col-md-11">
                    <p><?=$row['noi_dung']?></p>
                    <p> <i class="fas fa-user"> </i><?=tk_select_by_id($row['ma_tai_khoan'])['ten_tai_khoan']?>
                        <i class="fas fa-clock"></i><?=$row['ngay_binh_luan']?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>

        <?php
        if ($number > 1) {
        ?>
            <ul class="pagination justify-content-end">
                <?php
                if ($page > 1) {
                    echo ' <li class="page-item"><a href="?dien_dan&page=' . ($page - 1) . '" class="page-link">Previous</a></li>';
                }
                ?>

                <?php
                $avariablePage = [1, $page - 1, $page, $page + 1, $number];
                $isFirst = $isLast = false;
                for ($i = 0; $i < $number; $i++) {
                    if (!in_array($i + 1, $avariablePage)) {
                        if (!$isFirst && $page > 3) {
                            echo '<li class="page-item"><a href="?dien_dan&page=' . ($page - 2) . '" class="page-link">...</a></li> ';
                            $isFirst = true;
                        }
                        if (!$isLast && $i > $page) {
                            echo '<li class="page-item"><a href="?dien_dan&page=' . ($page + 2) . '" class="page-link">...</a></li> ';
                            $isLast = true;
                        }
                        continue;
                    }
                    if ($page == ($i + 1)) {
                        echo '<li class="page-item active"><a href="?dien_dan&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                    } else {
                        echo '<li class="page-item"><a href="?dien_dan&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                    }
                }
                ?>
                <?php
                if ($page < $number) {
                    echo ' <li class="page-item"><a href="?dien_dan&page=' . ($page + 1) . '" class="page-link">Next</a></li>';
                }
                ?>
            </ul>
        <?php
        }
        ?>
    </div>
</div>