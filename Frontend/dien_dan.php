<?php


?>
<h3 class="text-center">Quý khách hàng vui lòng để lại nhận xét để chúng tôi cải thiện dịch vụ tối ưu nhất</h3>
<div class="container mt-5">
    <div class="row">
        <h5>Bình luận</h5>
        <span class="" style="color: red;"><?= isset($errors['noidung']) ? $errors['noidung'] : '' ?></span>

        <?php
        if (isset($_SESSION['user'])) {
            echo '
                <form action="" method="post" class="col-md-12 m-0 p-0 mt-2">
                    <input type="text" class="form-control" name="noi_dung" placeholder="nhập bình luận">
                    <button type="submit" class="mt-2 btn btn-success" name="btn_binhluan">Bình luận</button>
                 </form>
                ';
        } else {
            echo '
            <div class="m-0 p-0">
                <a class="nav-link" href="index.php?login"></i> Đăng nhập để bình luận</a>
            </div>
            ';
        }
        ?>

        <?php foreach ($list_nv as $key => $row) : ?>

            <div class="row mt-2 border-bottom ml-0">
                <div class="col-md-1 mt-3">
                    <img class="" style="border-radius: 50%" src="<?= $IMG_URL ?>/taikhoan/<?= tk_select_by_id($row['ma_tai_khoan'])['hinh_anh'] ?>" width="100%" alt="">
                </div>
                <div class="col-md-11">
                    <p><?= $row['noi_dung'] ?></p>
                    <p> <i class="fas fa-user"> </i><?= tk_select_by_id($row['ma_tai_khoan'])['ten_tai_khoan'] ?>
                        <i class="fas fa-clock"></i><?= $row['ngay_binh_luan'] ?>
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