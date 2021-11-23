<?php
    if(isset($_GET['masp'])){
       $sp_detail = sp_select_by_id($_GET['masp']); 
    }   
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
                        <img src="../resources/img/dichvu/dichvu.jpg" style="width:100%">
                    </div>

                </div>
                <div class="col-sm-6">
                    <span class="">Trang chủ / Sản phẩm</span>
                    <h5 class="mt-4">Tên sản phẩm:  <?=$sp_detail['ten_san_pham']?></h5>
                    <p class="price mt-2 mb-5">Giá : <?=$sp_detail['gia']?> đ</p>
                    <a href="" class="btn btn-success">Đặt lịch ngay</a>
            
                </div>

            </div>

            <div>
                <h4>Thông tin chi tiết</h4>
                <p><?=$sp_detail['chi_tiet']?></p>
            </div>

        </div>
    </div>
</div>