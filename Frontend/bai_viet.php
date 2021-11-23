<?php
if (isset($_GET['msg'])) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

try {
    $limit = 9;
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    if ($page <= 0) {
        $page = 1;
    }
    $firstIndex = ($page - 1) * $limit;

    $list_nv = bv_select_All_limit($firstIndex, $limit);
    // Phân trang lấy số trang 
    $sql = "SELECT count(ma_bai_viet) as total FROM bai_viet";
    $countResult = pdo_query_one($sql);
    $count = $countResult['total'];
    $number = ceil($count / $limit);
} catch (PDOException $e) {
    die($e->getMessage());
}

?>
<link rel="stylesheet" href="../resources/css/frontend/bai_viet.css">
<div class="container pt-4 pb-4">
    <span>Trang chủ / Bài viết</span>
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <?php foreach ($list_nv as $key => $row) : ?>
                    <div class="col-sm-4 pt-4">
                        <div class="col-sm-12">
                            <div class="img">
                                <a href="index.php?chi_tiet_bai_viet&mabv=<?= $row['ma_bai_viet'] ?>">
                                    <img src="<?= $IMG_URL ?>/baiviet/<?= $row['hinh_anh'] ?>" alt="" width="100%" height="160px">
                                </a>
                            </div>
                            <div class="name"><?= $row['ten_bai_viet'] ?></div>
                            <div class="mo_ta">
                                <a href="index.php?chi_tiet_bai_viet&mabv=<?= $row['ma_bai_viet'] ?>">
                                    <?= $row['mo_ta'] ?> [...]
                                </a>
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
                            echo ' <li class="page-item"><a href="?bai_viet&page=' . ($page - 1) . '" class="page-link">Previous</a></li>';
                        }
                        ?>

                        <?php
                        $avariablePage = [1, $page - 1, $page, $page + 1, $number];
                        $isFirst = $isLast = false;
                        for ($i = 0; $i < $number; $i++) {
                            if (!in_array($i + 1, $avariablePage)) {
                                if (!$isFirst && $page > 3) {
                                    echo '<li class="page-item"><a href="?bai_viet&page=' . ($page - 2) . '" class="page-link">...</a></li> ';
                                    $isFirst = true;
                                }
                                if (!$isLast && $i > $page) {
                                    echo '<li class="page-item"><a href="?bai_viet&page=' . ($page + 2) . '" class="page-link">...</a></li> ';
                                    $isLast = true;
                                }
                                continue;
                            }
                            if ($page == ($i + 1)) {
                                echo '<li class="page-item active"><a href="?bai_viet&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                            } else {
                                echo '<li class="page-item"><a href="?bai_viet&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                            }
                        }
                        ?>
                        <?php
                        if ($page < $number) {
                            echo ' <li class="page-item"><a href="?bai_viet&page=' . ($page + 1) . '" class="page-link">Next</a></li>';
                        }
                        ?>
                    </ul>
                <?php
                }
                ?>

            </div>

        </div>
        <div class="col-sm-3 mt-4 dichvu">
            <img src="../resources/img/dichvu/aside.jpg" alt="" width="100%">
            <h4 class="mt-4">Dịch vụ tại PolyHair</h4>
            <div class="row">
                <div class="col-sm-12 mt-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="">
                                <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <div class="name">Tên dịch vụ</div>
                            <div class="price">100 000 đ</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="">
                                <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <div class="name">Tên dịch vụ</div>
                            <div class="price">100 000 đ</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="">
                                <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <div class="name">Tên dịch vụ</div>
                            <div class="price">100 000 đ</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="">
                                <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <div class="name">Tên dịch vụ</div>
                            <div class="price">100 000 đ</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="">
                                <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <div class="name">Tên dịch vụ</div>
                            <div class="price">100 000 đ</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>