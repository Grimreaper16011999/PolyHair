<?php
$dv = dv_select_limit_8();
$kt = kt_select_limit_8();
$km = km_select_limit_8();


?>
<link rel="stylesheet" href="../resources/css/frontend/home.css">

<div class="banner">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../resources/img/slider/slide1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Muốn tóc đẹp đến Poly Hair </h5>
                    <p>Yêu cái đẹp là thưởng thức. Tạo ra cái đẹp là nghệ thuật.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../resources/img/slider/slide2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Đơn giản là đẹp</h5>
                    <p>Hạnh phúc là bí mật làm nên mọi nét đẹp. Không nhan sắc nào có thể thu hút mà không song hành cùng hạnh phúc</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../resources/img/slider/slide3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Còn chần chờ gì nữa</h5>
                    <p>Vẻ đẹp của bạn là nghề nghiệp của chúng tôi.</p>
                </div>
            </div>
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
                        <a href="index.php?chi_tiet_dv&madv=<?=$value['ma_dich_vu']?>">
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
                        <a href="index.php?chi_tiet_mt&mamt=<?=$value['ma_kieu_toc']?>">
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
                        <a href="index.php?chi_tiet_khuyenmai&makm=<?=$value['ma_khuyen_mai']?>">
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