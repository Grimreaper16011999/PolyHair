<?php
require "../../global.php";
require "../../DAO/nhanvien.php";
require "../../DAO/coso.php";


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
            'tai_khoan' => '',
            'mat_khau' => '',
            'ten_nhan_vien' => '',
            'email' => '',
            'hinh_anh' => ''
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
        if (nhan_vien_exist($tai_khoan)) {
            $errors['tai_khoan'] = 'Tên tài khoản đã tồn tại';
        } else {
            if ($tai_khoan == null) {
                $errors['tai_khoan'] = 'Dữ liệu không được để trống';
            }
        }
        if ($mat_khau == null) {
            $errors['mat_khau'] = 'Dữ liệu không được để trống';
        }
        if ($ten_nhan_vien == null) {
            $errors['ten_nhan_vien'] = 'Dữ liệu không được để trống';
        }
        if ($email == null) {
            $errors['email'] = 'Dữ liệu không được để trống';
        }

        if (!array_filter($errors)) {
            $mat_khau = md5($mat_khau);
            nv_insert($ten_nhan_vien, $hinh_anh, $email, $ma_co_so, $tai_khoan, $mat_khau, $vai_tro);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/nhanvien/" . $hinh_anh);
            }
            $MESSAGE = "Thêm dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("edit")) {
    $VIEW_NAME = 'edit.php';
    $nv = nv_select_by_id($_GET['id']);
    if (isset($_POST['btn_edit'])) {
        extract($_POST);
        $ext_img = ['jpg', 'png'];
        $errors = [
            'ten_nhan_vien' => '',
            'email' => '',
            'hinh_anh' => ''
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
            $hinh_anh = $nv['hinh_anh'];
        }
        if ($ten_nhan_vien == null) {
            $errors['ten_nhan_vien'] = 'Dữ liệu không được để trống';
        }
        if ($email == null) {
            $errors['email'] = 'Dữ liệu không được để trống';
        }

        if (!array_filter($errors)) {
            nv_update($ten_nhan_vien, $hinh_anh, $email, $ma_co_so, $vai_tro, $ma_nhan_vien);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/nhanvien/" . $hinh_anh);
            }
            $MESSAGE = "Sửa dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("delete")) {
    try {
        nv_delete($ma_nhan_vien);
        $MESSAGE = 'Xoá thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Xoá thất bại";
    }
    header('location: index.php?msg=' . $MESSAGE);
} else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
