<?php
try {
    $limit = 8;
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    if ($page <= 0) {
        $page = 1;
    }
    $firstIndex = ($page - 1) * $limit;

    $list_nv = kt_select_All_limit($firstIndex, $limit);
    // Phân trang lấy số trang 
    $sql = "SELECT count(ma_kieu_toc) as total FROM kieu_toc";
    $countResult = pdo_query_one($sql);
    $count = $countResult['total'];
    $number = ceil($count / $limit);
} catch (PDOException $e) {
    die($e->getMessage());
}

?>
<link rel="stylesheet" href="../resources/css/frontend/dich_vu.css">
<div class="container pt-4 pb-4">
    <span>Trang chủ / Kiểu tóc</span>
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

        <?php foreach ($list_nv as $key => $value) : ?>
            <div class="trip col-lg-3 col-sm-4 col-6 mt-2 mb-2">
            <div class="col-md-12">
                <div class="img">
                    <a href="index.php?chi_tiet_kieutoc&makt=<?= $value['ma_kieu_toc'] ?>">
                        <img src="<?= $IMG_URL ?>/mau_toc/<?= $value['hinh_anh'] ?>" alt="" width="100%">
                    </a>
                    <div class="detail">
                        <span>Xem chi tiết</span>
                    </div>
                </div>
            </div>
            <div class="info">
                <h4><?= $value['ten_kieu_toc'] ?></h4>
            </div>
        </div>
        <?php endforeach; ?>
        <?php
        if ($number > 1) {
        ?>
            <ul class="pagination justify-content-end">
                <?php
                if ($page > 1) {
                    echo ' <li class="page-item"><a href="index.php?style&page=' . ($page - 1) . '" class="page-link">Previous</a></li>';
                }
                ?>

                <?php
                $avariablePage = [1, $page - 1, $page, $page + 1, $number];
                $isFirst = $isLast = false;
                for ($i = 0; $i < $number; $i++) {
                    if (!in_array($i + 1, $avariablePage)) {
                        if (!$isFirst && $page > 3) {
                            echo '<li class="page-item"><a href="index.php?style&page=' . ($page - 2) . '" class="page-link">...</a></li> ';
                            $isFirst = true;
                        }
                        if (!$isLast && $i > $page) {
                            echo '<li class="page-item"><a href="index.php?style&page=' . ($page + 2) . '" class="page-link">...</a></li> ';
                            $isLast = true;
                        }
                        continue;
                    }
                    if ($page == ($i + 1)) {
                        echo '<li class="page-item active"><a href="index.php?style&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                    } else {
                        echo '<li class="page-item"><a href="index.php?style&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                    }
                }
                ?>
                <?php
                if ($page < $number) {
                    echo ' <li class="page-item"><a href="index.php?style&page=' . ($page + 1) . '" class="page-link">Next</a></li>';
                }
                ?>
            </ul>
        <?php
        }
        ?>
    </div>
</div>