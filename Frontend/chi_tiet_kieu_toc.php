<?php
    $kt_detail= kt_select_by_id($_GET['makt']);
?>

<link rel="stylesheet" href="../resources/css/frontend/chi_tiet.css">
<div class="container pt-4 pb-4">
    <div class="row">
        <div class="col-sm-3">
            <div class="dich_vu_new">
                <h5 class="m-0">Dịch vụ mới</h5>
                <div class="dich_vu mt-2">
                    <div class="row pb-2 pt-2 ml-0 border-bottom">
                        <div class="col-sm-4">
                            <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                        </div>
                        <div class="col-sm-8">
                            <p>
                                <a href="">Tên dịch vụ</a>
                            </p>
                            <p class="price">
                                50 000đ
                            </p>
                        </div>
                    </div>
                    <div class="row pb-2 pt-2 ml-0 border-bottom">
                        <div class="col-sm-4">
                            <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                        </div>
                        <div class="col-sm-8">
                            <p>
                                <a href="">Tên dịch vụ</a>
                            </p>
                            <p class="price">
                                50 000đ
                            </p>
                        </div>
                    </div>
                    <div class="row pb-2 pt-2 ml-0 border-bottom">
                        <div class="col-sm-4">
                            <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                        </div>
                        <div class="col-sm-8">
                            <p>
                                <a href="">Tên dịch vụ</a>
                            </p>
                            <p class="price">
                                50 000đ
                            </p>
                        </div>
                    </div>
                    <div class="row pb-2 pt-2 ml-0 border-bottom">
                        <div class="col-sm-4">
                            <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                        </div>
                        <div class="col-sm-8">
                            <p>
                                <a href="">Tên dịch vụ</a>
                            </p>
                            <p class="price">
                                50 000đ
                            </p>
                        </div>
                    </div>
                    <div class="row pb-2 pt-2 ml-0 border-bottom">
                        <div class="col-sm-4">
                            <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                        </div>
                        <div class="col-sm-8">
                            <p>
                                <a href="">Tên dịch vụ</a>
                            </p>
                            <p class="price">
                                50 000đ
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="dich_vu_new mt-3">
                <h5 class="m-0">Bài viết mới</h5>
                <div class="dich_vu mt-2">
                    <div class="row pb-2 pt-2 ml-0 border-bottom">
                        <div class="col-sm-4">
                            <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                        </div>
                        <div class="col-sm-8">
                            <p>
                                <a href="">Tên bài viết</a>
                            </p>
                            <p class="mo_ta">
                                Mô tả
                            </p>
                        </div>
                    </div>
                    <div class="row pb-2 pt-2 ml-0 border-bottom">
                        <div class="col-sm-4">
                            <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                        </div>
                        <div class="col-sm-8">
                            <p>
                                <a href="">Tên bài viết</a>
                            </p>
                            <p class="mo_ta">
                                Mô tả
                            </p>
                        </div>
                    </div>
                    <div class="row pb-2 pt-2 ml-0 border-bottom">
                        <div class="col-sm-4">
                            <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                        </div>
                        <div class="col-sm-8">
                            <p>
                                <a href="">Tên bài viết</a>
                            </p>
                            <p class="mo_ta">
                                Mô tả
                            </p>
                        </div>
                    </div>
                    <div class="row pb-2 pt-2 ml-0 border-bottom">
                        <div class="col-sm-4">
                            <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                        </div>
                        <div class="col-sm-8">
                            <p>
                                <a href="">Tên bài viết</a>
                            </p>
                            <p class="mo_ta">
                                Mô tả
                            </p>
                        </div>
                    </div>
                    <div class="row pb-2 pt-2 ml-0 border-bottom">
                        <div class="col-sm-4">
                            <img src="../resources/img/dichvu/dichvu.jpg" alt="" width="100%">
                        </div>
                        <div class="col-sm-8">
                            <p>
                                <a href="">Tên bài viết</a>
                            </p>
                            <p class="mo_ta">
                                Mô tả
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-9" style="min-height: 500px;">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mySlides" style="display:block">
                        <img src="<?= $IMG_URL ?>/mau_toc/<?= $kt_detail['hinh_anh'] ?>" style="width:100%">
                    </div>

                </div>
                <div class="col-sm-6">
                    <span>Trang chủ / Kiểu tóc</span>
                    <h5>Tên kiểu tóc : <?=$kt_detail['ten_kieu_toc']?></h5>
                    <h6 class="mt-4 mb-5">Mô tả: <?=$kt_detail['mo_ta']?></h6>
                    <a href="index.php?dat_lich" class="btn btn-success">Đặt lịch ngay</a>
                </div>

            </div>

            <div>
                <h4>Thông tin chi tiết</h4>
                <div class="detail">
                    <?=$kt_detail['chi_tiet']?>
                </div>
            </div>
        </div>
    </div>
</div>