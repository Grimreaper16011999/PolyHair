<?php
$dv = dv_select_limit_8();
$kt = kt_select_limit_8();
$km = km_select_limit_8();
$sliders = slider_select_All_bat();

?>
<link rel="stylesheet" href="../resources/css/frontend/home.css">

<div class="banner">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php foreach ($sliders as $key => $value) : ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $key ?>" class="<?= ($key == 0) ? 'active' : '' ?>" aria-current="<?= ($key == 0) ? 'true' : '' ?>" aria-label="Slide <?= $key ?>"></button>
            <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($sliders as $key => $value) : ?>
                <div class="carousel-item <?php if ($key == 0) {
                                                echo 'active';
                                            } ?>">
                    <img src="../resources/img/slider/<?= $value['hinh_anh'] ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= $value['tieu_de'] ?></h5>
                        <p><?= $value['noi_dung'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="content container mt-4 mb-4">
    <h3 class="text-center text-uppercase">Dịch vụ mới nhất</h3>
    <div class="row">
        <!-- <marquee behavior="" direction="up"></marquee> -->
        <?php foreach ($dv as $key => $value) : ?>
            <div class="trip col-6 col-sm-4  mt-2 mb-2 col-lg-3" style="height: auto;">
                <div class="col-md-12">
                    <div class="img">
                        <a href="index.php?chi_tiet_dv&madv=<?= $value['ma_dich_vu'] ?>">
                            <img src="<?= $IMG_URL ?>/dichvu/<?= $value['hinh_anh'] ?>" alt="" width="274" height="300">
                        </a>
                        <div class="info">
                            <h4><?= $value['ten_dich_vu'] ?></h4>
                            <span class="price"><?= $value['gia'] ?> đ</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h3 class="text-center text-uppercase mt-5">Mẫu tóc mới nhất</h3>
    <div class="row">
        <!-- <marquee behavior="" direction="up"></marquee> -->
        <?php foreach ($kt as $key => $value) : ?>
            <div class="trip col-6 col-sm-4  mt-2 mb-2 col-lg-3" style="height: auto;">
                <div class="col-md-12">
                    <div class="img">
                        <a href="index.php?chi_tiet_mt&mamt=<?= $value['ma_kieu_toc'] ?>">
                            <img src="<?= $IMG_URL ?>/mau_toc/<?= $value['hinh_anh'] ?>" alt="" width="100%">
                        </a>
                        <div class="info">
                            <h4><?= $value['ten_kieu_toc'] ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <h3 class="text-center text-uppercase mt-5">Chương trình khuyến mãi Hot</h3>
    <div class="row">
        <!-- <marquee behavior="" direction="up"></marquee> -->
        <?php foreach ($km as $key => $value) : ?>
            <div class="trip col-6 col-sm-4  mt-2 mb-2 col-lg-3" style="height: auto;">
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

    </div>
</div>