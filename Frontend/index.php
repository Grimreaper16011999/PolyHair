<?php

require "../global.php";
require "../DAO/coso.php";
require "../DAO/taikhoan.php";
require "../DAO/nhanvien.php";
require "../DAO/khunggio.php";
require "../DAO/dichvu.php";
require "../DAO/khuyenmai.php";
require "../DAO/lich_hen.php";
require "../DAO/baiviet.php";
require "../DAO/kieutoc.php";



extract($_REQUEST);
if (exist_param("dat_lich")) {
    $VIEW_NAME = "dat_lich.php";
    if (isset($_POST['btn_dat_lich'])) {
        extract($_POST);
        $errors = [
            'so_dien_thoai' => '',
            'ma_co_so' => '',
            'ngay_cat' => '',
            'ma_khung_gio' => ''
        ];
        if ($so_dien_thoai == null) {
            $errors['so_dien_thoai'] = 'Dữ liệu không để trống';
        } else {
            if (!preg_match('/^(09|03|07|08|05)+([0-9]{8})$/', $so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không hợp lệ';
            }
        }
        if (!isset($ma_co_so)) {
            $errors['ma_co_so'] = 'bạn phải chọn cơ sỏ';
        }
        if (!isset($ma_khung_gio)) {
            $errors['ma_khung_gio'] = 'bạn phải chọn khung giờ';
        }
        if ($ngay_cat == null) {
            $errors['ngay_cat'] = 'bạn phải chọn ngày cắt';
        }
        if (!array_filter($errors)) {
            lich_hen_insert($ma_tai_khoan,  $so_dien_thoai,  $ma_co_so,  $ma_nhan_vien, $ngay_cat,  $ma_khung_gio,  $ma_dich_vu,  $ma_khuyen_mai,  $ghi_chu);
            $MESSAGE = "Bạn đã đặt lịch thành công vui lòng xem chi tiết đặt lịch tại phần tài khoản -> lịch sử đơn hàng";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("home")) {
    $VIEW_NAME = "home.php";
} elseif (exist_param("dich_vu")) {
    $VIEW_NAME = "dich_vu.php";
} elseif (exist_param("bai_viet")) {
    $VIEW_NAME = "bai_viet.php";
} elseif (exist_param("store")) {
    $VIEW_NAME = "store.php";
} elseif (exist_param("login")) {
    $VIEW_NAME = "login.php";
} elseif (exist_param("chi_tiet")) {
    $VIEW_NAME = "chi_tiet.php";
} elseif (exist_param("chi_tiet_dv")) {
    $VIEW_NAME = "chi_tiet_dich_vu.php";
} elseif (exist_param("chi_tiet_mt")) {
    $VIEW_NAME = "chi_tiet_mau_toc.php";
} elseif (exist_param("chi_tiet_bai_viet")) {
    $VIEW_NAME = "chi_tiet_bai_viet.php";
} elseif (exist_param("chi_tiet_khuyenmai")) {
    $VIEW_NAME = "chi_tiet_khuyenmai.php";
} elseif (exist_param("khuyen_mai")) {
    $VIEW_NAME = "khuyen_mai.php";
} elseif (exist_param("style")) {
    $VIEW_NAME = "style.php";
} elseif (exist_param("dien_dan")) {
    $VIEW_NAME = "dien_dan.php";
} elseif (exist_param("register")) {
    $VIEW_NAME = "register.php";
} else {
    $VIEW_NAME = "home.php";
}
include_once "layout.php";
