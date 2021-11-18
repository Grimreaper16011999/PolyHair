<?php
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

    $list_nv = dv_select_All_limit($firstIndex, $limit);
    // Phân trang lấy số trang 
    $sql = "SELECT count(ma_dich_vu) as total FROM dich_vu";
    $countResult = pdo_query_one($sql);
    $count = $countResult['total'];
    $number = ceil($count / $limit);
} catch (PDOException $e) {
    die($e->getMessage());
}
?>
<link rel="stylesheet" href="../resources/css/frontend/dich_vu.css">
<div class="container pt-4 pb-4">
    <span>Trang chủ / dịch vụ</span>
    <nav class="navbar navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand">
                Tìm kiếm
            </a>
            <form class="d-flex" method="POST">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="row">
        <?php foreach ($list_nv as $key => $row) : ?>
            <div class="trip col-lg-3 col-sm-4 col-6 mt-2 mb-2">
                <div class="col-md-12">
                    <div class="img">
                        <a href="">
                            <img src="<?= $IMG_URL ?>/dichvu/<?=$row['hinh_anh']?>" alt="" width="100%" height="300px">
                        </a>
                        <div class="detail">
                            <span>Xem chi tiết</span>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <h4>Tên combo</h4>
                    <span class="price">100 000đ</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    if ($number > 1) {
    ?>
        <ul class="pagination justify-content-end">
            <?php
            if ($page > 1) {
                echo ' <li class="page-item"><a href="?dich_vu&page=' . ($page - 1) . '" class="page-link">Previous</a></li>';
            }
            ?>

            <?php
            $avariablePage = [1, $page - 1, $page, $page + 1, $number];
            $isFirst = $isLast = false;
            for ($i = 0; $i < $number; $i++) {
                if (!in_array($i + 1, $avariablePage)) {
                    if (!$isFirst && $page > 3) {
                        echo '<li class="page-item"><a href="?dich_vu&page=' . ($page - 2) . '" class="page-link">...</a></li> ';
                        $isFirst = true;
                    }
                    if (!$isLast && $i > $page) {
                        echo '<li class="page-item"><a href="?dich_vu&page=' . ($page + 2) . '" class="page-link">...</a></li> ';
                        $isLast = true;
                    }
                    continue;
                }
                if ($page == ($i + 1)) {
                    echo '<li class="page-item active"><a href="?dich_vu&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                } else {
                    echo '<li class="page-item"><a href="?dich_vu&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                }
            }
            ?>
            <?php
            if ($page < $number) {
                echo ' <li class="page-item"><a href="?dich_vu&page=' . ($page + 1) . '" class="page-link">Next</a></li>';
            }
            ?>
        </ul>
    <?php
    }
    ?>
</div>