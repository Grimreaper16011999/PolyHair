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
<link rel="stylesheet" href="../resources/css/frontend/home.css">
<h2 class="text-center p-4" style="background-color: #fc3; color: #333">ƯU ĐÃI PolyHair</h2>
<div class="content">
    <div class="banner m-0 p-0">
        <img src="img/sale/baner.jpg" alt="" width="100%">
    </div>
    <div class="container mt-4">
        <div class="row">
            <?php foreach ($list_nv as $key => $value) : ?>
                <div class="trip col-6 col-sm-4  mt-2 mb-2 col-lg-3">
                    <div class="col-md-12">
                        <div class="img">
                            <a href="index.php?chi_tiet_khuyenmai&makm=<?= $value['ma_khuyen_mai'] ?>">
                                <img src="<?= $IMG_URL ?>/khuyenmai/<?= $value['hinh_anh'] ?>" alt="" width="100%">
                            </a>
                            <div class="info">
                                <h4><?= $value['ten_khuyen_mai'] ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php
            if ($number > 1) {
            ?>
                <ul class="pagination justify-content-end">
                    <?php
                    if ($page > 1) {
                        echo ' <li class="page-item"><a href="index.php?khuyen_mai&page=' . ($page - 1) . '" class="page-link">Previous</a></li>';
                    }
                    ?>

                    <?php
                    $avariablePage = [1, $page - 1, $page, $page + 1, $number];
                    $isFirst = $isLast = false;
                    for ($i = 0; $i < $number; $i++) {
                        if (!in_array($i + 1, $avariablePage)) {
                            if (!$isFirst && $page > 3) {
                                echo '<li class="page-item"><a href="index.php?khuyen_mai&page=' . ($page - 2) . '" class="page-link">...</a></li> ';
                                $isFirst = true;
                            }
                            if (!$isLast && $i > $page) {
                                echo '<li class="page-item"><a href="index.php?khuyen_mai&page=' . ($page + 2) . '" class="page-link">...</a></li> ';
                                $isLast = true;
                            }
                            continue;
                        }
                        if ($page == ($i + 1)) {
                            echo '<li class="page-item active"><a href="index.php?khuyen_mai&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                        } else {
                            echo '<li class="page-item"><a href="index.php?khuyen_mai&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                        }
                    }
                    ?>
                    <?php
                    if ($page < $number) {
                        echo ' <li class="page-item"><a href="index.php?khuyen_mai&page=' . ($page + 1) . '" class="page-link">Next</a></li>';
                    }
                    ?>
                </ul>
            <?php
            }
            ?>
        </div>
    </div>
</div>