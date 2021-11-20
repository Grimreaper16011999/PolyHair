<?php
    $km_detail= km_select_by_id($_GET['makm']);
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
                        <img src="<?= $IMG_URL ?>/khuyenmai/<?= $km_detail['hinh_anh'] ?>" style="width:100%">
                    </div>

                </div>
                <div class="col-sm-6">
                    <span>Trang chủ / Khuyến mãi</span>
                    <h5>Tên khuyến mãi : <?=$km_detail['ten_khuyen_mai']?></h5>
                    <h6>Mã khuyến mãi: <?=$km_detail['ma_khuyen_mai']?></h6>
                    <p>Nhập mã khuyến mãi trên để nhận ưu đãi</p>
                    <h6>Số lượng còn lại: <?=$km_detail['so_luong']?></h6>
                    <h6>Ngày hết hạn: <?=$km_detail['ngay_het_han']?></h6>
                    <a href="index.php?dat_lich" class="btn btn-success">Đặt lịch ngay</a>
                </div>

            </div>

            <div>
                <h4>Thông tin chi tiết</h4>
                <div class="detail">
                    <?=$km_detail['chi_tiet']?>
                </div>
            </div>
        </div>
    </div>
</div>