<?php
$bv_detail = bv_select_by_id($_GET['mabv']);


?>
<link rel="stylesheet" href="../resources/css/frontend/bai_viet.css">
<div class="container pt-4 pb-4">
    <span>Trang chủ / Bài viết</span>
    <div class="row">
        <div class="col-sm-9">
            <h2 class="mt-2"><?= $bv_detail['ten_bai_viet'] ?></h2>
            <b><?= $bv_detail['mo_ta'] ?></b>
            <p>
                <img class="mt-2" src="<?= $IMG_URL ?>/baiviet/<?= $bv_detail['hinh_anh'] ?>" style="width:80%">
            </p>
            <div class="detail">
                <?= $bv_detail['chi_tiet'] ?>
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