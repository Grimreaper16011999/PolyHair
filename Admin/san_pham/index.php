<?php
require "../../global.php";
require "../../DAO/sanpham.php";

extract($_REQUEST);

if (exist_param("add")) {
    $VIEW_NAME = 'add.php';
    if (isset($_POST['reset'])) {
        header('location: index.php?add');
    }
    if (isset($_POST['btn_insert'])) {
        extract($_POST);
        $ext_img = ['jpg', 'png'];
        $errors = [
            'ten_kieu_toc' => '',
            'gia' => '',
            'hinh_anh' => '',
            'chi_tiet' => ''
        ];

        if ($_FILES['hinh']['size'] > 0) {
            $file = $_FILES['hinh'];
            $hinh_anh = '';
            if ($file['size'] > 0 && $file['size'] <= 2 * 1024 * 1024) {
                $hinh_anh = $file['name'];
                $ext = pathinfo($hinh_anh, PATHINFO_EXTENSION);
                if (!in_array($ext, $ext_img)) {
                    $errors['hinh_anh'] = "Bạn phải chọn file png hoặc jpg";
                }
            } else {
                $errors['hinh_anh'] = "Bạn phải chọn file <=2MB";
            }
        } else {
            $hinh_anh = '1.jpg';
        }
        if ($ten_san_pham == null) {
            $errors['ten_san_pham'] = 'Dữ liệu không được để trống';
        }
        if ($gia == null) {
            $errors['gia'] = 'Dữ liệu không được để trống';
        }
        elseif(!is_numeric($gia) || $gia <0){
            $errors['gia'] = 'Giá phải là số dương';
        }
        if ($chi_tiet == null) {
            $errors['chi_tiet'] = 'Dữ liệu không được để trống';
        }

        if (!array_filter($errors)) {
            sp_insert($ten_san_pham, $hinh_anh, $gia, $chi_tiet);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/product/" . $hinh_anh);
            }
            $MESSAGE = "Thêm dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("edit")) {
    $VIEW_NAME = 'edit.php';
    $sp = sp_select_by_id($_GET['id']);
    if (isset($_POST['btn_edit'])) {
        extract($_POST);
        $ext_img = ['jpg', 'png'];
        $errors = [
            'ten_kieu_toc' => '',
            'gia' => '',
            'hinh_anh' => '',
            'chi_tiet' => ''
        ];

        if ($_FILES['hinh']['size'] > 0) {
            $file = $_FILES['hinh'];
            $hinh_anh = '';
            if ($file['size'] > 0 && $file['size'] <= 2 * 1024 * 1024) {
                $hinh_anh = $file['name'];
                $ext = pathinfo($hinh_anh, PATHINFO_EXTENSION);
                if (!in_array($ext, $ext_img)) {
                    $errors['hinh_anh'] = "Bạn phải chọn file png hoặc jpg";
                }
            } else {
                $errors['hinh_anh'] = "Bạn phải chọn file <=2MB";
            }
        } else {
            $hinh_anh = $sp['hinh_anh'];
        }
        if ($ten_san_pham == null) {
            $errors['ten_san_pham'] = 'Dữ liệu không được để trống';
        }
        if ($gia == null) {
            $errors['gia'] = 'Dữ liệu không được để trống';
        }
        elseif(!is_numeric($gia) || $gia <0){
            $errors['gia'] = 'Giá phải là số dương';
        }
        if ($chi_tiet == null) {
            $errors['chi_tiet'] = 'Dữ liệu không được để trống';
        }

        if (!array_filter($errors)) {
            sp_update($ten_san_pham, $hinh_anh, $gia, $chi_tiet, $ma_san_pham);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/product/" . $hinh_anh);
            }
            $MESSAGE = "Sửa dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("delete")) {
    try {
        sp_delete($ma_san_pham);
        $MESSAGE = 'Xoá thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Xoá thất bại";
    }
    header('location: index.php?msg=' . $MESSAGE);
} else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
