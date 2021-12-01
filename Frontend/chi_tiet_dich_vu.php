<?php
$dv_detail = dv_select_by_id($_GET['madv']);
$dv_5 = dv_select_limit_5();
$bv_5 = bv_select_limit_5();
?>

<link rel="stylesheet" href="../resources/css/frontend/chi_tiet.css">
<div class="container pt-4 pb-4">
    <div class="row">
        <div class="col-sm-3">
            <div class="dich_vu_new">
                <h5 class="m-0">Dịch vụ mới</h5>
                <div class="dich_vu mt-2">
                    <?php foreach ($dv_5 as $key => $value) : ?>
                        <div class="row pb-2 pt-2 ml-0 border-bottom">
                            <div class="col-sm-4">
                                <a href="index.php?chi_tiet_dv&madv=<?= $value['ma_dich_vu'] ?>">
                                    <img src="../resources/img/dichvu/<?= $value['hinh_anh'] ?>" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <p>
                                    <a href="index.php?chi_tiet_dv&madv=<?= $value['ma_dich_vu'] ?>"><?= $value['ten_dich_vu'] ?></a>
                                </p>
                                <p class="price">
                                    <?= $value['gia'] ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
            <div class="dich_vu_new mt-3">
                <h5 class="m-0">Bài viết mới</h5>
                <div class="dich_vu mt-2">
                    <?php foreach ($bv_5 as $key => $value) : ?>

                        <div class="row pb-2 pt-2 ml-0 border-bottom">
                            <div class="col-sm-4">
                                <a href="index.php?chi_tiet_bai_viet&mabv=<?= $value['ma_bai_viet'] ?>">
                                    <img src="../resources/img/baiviet/<?=$value['hinh_anh']?>" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <p>
                                    <a href=""><?=$value['ten_bai_viet']?></a>
                                </p>
                                
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>
        <div class="col-sm-9" style="min-height: 500px;">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mySlides" style="display:block">
                        <img src="<?= $IMG_URL ?>/dichvu/<?= $dv_detail['hinh_anh'] ?>" style="width:100%">
                    </div>

                </div>
                <div class="col-sm-6">
                    <span>Trang chủ / Dịch vụ</span>
                    <h5 class="mt-4">Tên dịch vụ: <?= $dv_detail['ten_dich_vu'] ?></h5>
                    <p class="price mt-4">Giá: <?= $dv_detail['gia'] ?> đ</p>
                    <p class="km">Khuyến mãi: <?= $dv_detail['gia_km'] ?> %</p>
                    <a href="index.php?dat_lich" class="btn btn-success">Đặt lịch ngay</a>
                </div>

            </div>

            <div>
                <h4>Thông tin chi tiết</h4>
                <div class="detail">
                    <?= $dv_detail['chi_tiet'] ?>
                </div>
            </div>
        </div>
    </div>
</div>