<?php
require "../../global.php";
require "../../DAO/baiviet.php";

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
            'ten_bai_viet' => '',
            'mo_ta' => '',
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
        if ($ten_bai_viet == null) {
            $errors['ten_bai_viet'] = 'Dữ liệu không được để trống';
        }
        if ($mo_ta == null) {
            $errors['mo_ta'] = 'Dữ liệu không được để trống';
        }
        if ($chi_tiet == null) {
            $errors['chi_tiet'] = 'Dữ liệu không được để trống';
        }

        if (!array_filter($errors)) {
            bv_insert($ten_bai_viet, $hinh_anh, $mo_ta, $chi_tiet);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/baiviet/" . $hinh_anh);
            }
            $MESSAGE = "Thêm dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("edit")) {
    $VIEW_NAME = 'edit.php';
    $bv = bv_select_by_id($_GET['id']);
    if (isset($_POST['reset'])) {
        header('location: index.php?add');
    }
    if (isset($_POST['btn_edit'])) {
        extract($_POST);
        $ext_img = ['jpg', 'png'];
        $errors = [
            'ten_bai_viet' => '',
            'mo_ta' => '',
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
            $hinh_anh = $bv['hinh_anh'];
        }
        if ($ten_bai_viet == null) {
            $errors['ten_bai_viet'] = 'Dữ liệu không được để trống';
        }
        if ($mo_ta == null) {
            $errors['mo_ta'] = 'Dữ liệu không được để trống';
        }
        if ($chi_tiet == null) {
            $errors['chi_tiet'] = 'Dữ liệu không được để trống';
        }

        if (!array_filter($errors)) {
            bv_update($ten_bai_viet, $hinh_anh, $mo_ta, $chi_tiet, $ma_bai_viet);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/baiviet/" . $hinh_anh);
            }
            $MESSAGE = "Sửa dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("delete")) {
    try {
        bv_delete($ma_bai_viet);
        $MESSAGE = 'Xoá thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Xoá thất bại";
    }
    header('location: index.php?msg=' . $MESSAGE);
} else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
