<?php
require "../../global.php";
require "../../DAO/khuyenmai.php";


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
            'ten_khuyen_mai' => '',
            'gia' => '',
            'so_luong' => '',
            'chi_tiet' => '',
            'ngay_het_han' => ''
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
            $hinh_anh = 'mau toc 1.jpg';
        }
        if ($ten_khuyen_mai == null) {
            $errors['ten_khuyen_mai'] = 'Dữ liệu không được để trống';
        }
        if ($ngay_het_han == null) {
            $errors['ngay_het_han'] = 'Dữ liệu không được để trống';
        }
        if ($chi_tiet == null) {
            $errors['chi_tiet'] = 'Dữ liệu không được để trống';
        }
        if ($gia == null) {
            $errors['gia'] = 'Dữ liệu không được để trống';
        } else {
            if (!is_numeric($gia) || $gia < 0 || $gia > 100) {
                $errors['gia'] = 'mức giá phải là số và từ 0 đến 100';
            }
        }
        if ($so_luong == null) {
            $errors['so_luong'] = 'Dữ liệu không được để trống';
        } else {
            if (!is_numeric($so_luong)) {
                $errors['so_luong'] = 'Số lượng phải là số';
            }
        }


        if (!array_filter($errors)) {
            km_insert($ten_khuyen_mai, $hinh_anh, $gia, $chi_tiet, $so_luong, $ngay_het_han);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/khuyenmai/" . $hinh_anh);
            }
            $MESSAGE = "Thêm dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("edit")) {
    $VIEW_NAME = 'edit.php';
    $km = km_select_by_id($_GET['id']);
    if (isset($_POST['btn_edit'])) {
        extract($_POST);
        $ext_img = ['jpg', 'png'];
        $errors = [
            'ten_khuyen_mai' => '',
            'gia' => '',
            'so_luong' => '',
            'chi_tiet' => '',
            'ngay_het_han' => ''
        ];
        if ($ngay_het_han == null) {
            $errors['ngay_het_han'] = 'Dữ liệu không được để trống';
        }
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
            $hinh_anh = $km['hinh_anh'];
        }
        if ($ten_khuyen_mai == null) {
            $errors['ten_khuyen_mai'] = 'Dữ liệu không được để trống';
        }
        if ($chi_tiet == null) {
            $errors['chi_tiet'] = 'Dữ liệu không được để trống';
        }
        if ($gia == null) {
            $errors['gia'] = 'Dữ liệu không được để trống';
        } else {
            if (!is_numeric($gia) || $gia < 0 || $gia > 100) {
                $errors['gia'] = 'mức giá phải là số và từ 0 đến 100';
            }
        }
        if ($so_luong == null) {
            $errors['so_luong'] = 'Dữ liệu không được để trống';
        } else {
            if (!is_numeric($so_luong)) {
                $errors['so_luong'] = 'Số lượng phải là số';
            }
        }


        if (!array_filter($errors)) {
            km_update($ten_khuyen_mai, $hinh_anh, $gia, $chi_tiet, $so_luong, $ngay_het_han, $ma_khuyen_mai);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/khuyenmai/" . $hinh_anh);
            }
            $MESSAGE = "Sửa dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("delete")) {
    try {
        km_delete($ma_khuyen_mai);
        $MESSAGE = 'Xoá thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Xoá thất bại";
    }
    header('location: index.php?msg=' . $MESSAGE);
} else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
