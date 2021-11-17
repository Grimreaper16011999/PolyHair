<?php
require "../../global.php";
require "../../DAO/dichvu.php";


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
            'ten_dich_vu' => '',
            'gia' => '',
            'chi_tiet' => '',
            'url' => ''
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
            $hinh_anh = 'aside.jpg';
        }
        if ($ten_dich_vu == null) {
            $errors['ten_dich_vu'] = 'Dữ liệu không được để trống';
        }
        if ($chi_tiet == null) {
            $errors['chi_tiet'] = 'Dữ liệu không được để trống';
        }
        if($gia ==null){
            $errors['gia'] = 'Dữ liệu không được để trống';
        }
        if(!is_numeric($gia)){
            $errors['gia'] = 'Sai định dạng dữ liệu';
        }

        if (!array_filter($errors)) {
            dv_insert($ten_dich_vu,$hinh_anh,$gia,$chi_tiet);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/dichvu/" . $hinh_anh);
            }
            $MESSAGE = "Thêm dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("edit")) {
    $VIEW_NAME = 'edit.php';
    $dv = dv_select_by_id($_GET['id']);
    if (isset($_POST['btn_edit'])) {
        extract($_POST);
        $ext_img = ['jpg', 'png'];
        $errors = [
            'ten_dich_vu' => '',
            'gia' => '',
            'chi_tiet' => '',
            'url' => ''
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
            $hinh_anh = $dv['hinh_anh'];
        }
        if ($ten_dich_vu == null) {
            $errors['ten_dich_vu'] = 'Dữ liệu không được để trống';
        }
        if ($chi_tiet == null) {
            $errors['chi_tiet'] = 'Dữ liệu không được để trống';
        }
        if($gia ==null){
            $errors['gia'] = 'Dữ liệu không được để trống';
        }
        if(!is_numeric($gia)){
            $errors['gia'] = 'Sai định dạng dữ liệu';
        }

        if (!array_filter($errors)) {
            dv_update($ten_dich_vu,$hinh_anh,$gia,$chi_tiet,$ma_dich_vu);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/dichvu/" . $hinh_anh);
            }
            $MESSAGE = "Sửa dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("delete")) {
    try {
        dv_delete($ma_dich_vu);
        $MESSAGE = 'Xoá thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Xoá thất bại";
    }
    header('location: index.php?msg=' . $MESSAGE);
} else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
