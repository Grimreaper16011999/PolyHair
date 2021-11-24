<?php
require "../../global.php";
require "../../DAO/taikhoan.php";


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
            'ten_tai_khoan' => '',
            'mat_khau' => '',
            're_mat_khau' => '',
            'hinh_anh' => '',
            'email' => '',
            'ho_ten'=>''
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
            $hinh_anh = 'tk.jpg';
        }
        if ($ho_ten == null) {
            $errors['ho_ten'] = 'Dữ liệu không được để trống';
        }
        if (tai_khoan_exist($ten_tai_khoan)) {
            $errors['ten_tai_khoan'] = 'Tên tài khoản đã tồn tại';
        } 
        if ($ten_tai_khoan == null) {
            $errors['ten_tai_khoan'] = 'Dữ liệu không được để trống';
        }
        if ($email == null) {
            $errors['email'] = 'Dữ liệu không được để trống';
        }
        $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
        if (!preg_match($regex, $email)) {
            $errors['email'] = 'sai định dạng email';
        }
        if ($mat_khau == null) {
            $errors['mat_khau'] = 'Dữ liệu không được để trống';
        }
        if ($re_mat_khau != $mat_khau) {
            $errors['re_mat_khau'] = 'Mật khẩu xác nhận không trùng khớp';
        }

        if (!array_filter($errors)) {
            tk_insert($ten_tai_khoan,$ho_ten, $hinh_anh, $mat_khau, $email, $trang_thai);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/taikhoan/" . $hinh_anh);
            }
            $MESSAGE = "Thêm dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("edit")) {
    $VIEW_NAME = 'edit.php';
    $tk = tk_select_by_id($_GET['id']);
    if (isset($_POST['btn_edit'])) {
        extract($_POST);
        $ext_img = ['jpg', 'png'];
        $errors = [
            'ten_tai_khoan' => '',
            'mat_khau' => '',
            're_mat_khau' => '',
            'hinh_anh' => '',
            'email' => '',
            'ho_ten'=>''
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
            $hinh_anh = $tk['hinh_anh'];
        }
        if ($ten_tai_khoan == null) {
            $errors['ten_tai_khoan'] = 'Dữ liệu không được để trống';
        }
        if ($ho_ten == null) {
            $errors['ho_ten'] = 'Dữ liệu không được để trống';
        }
        if ($email == null) {
            $errors['email'] = 'Dữ liệu không được để trống';
        }
        $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
        if (!preg_match($regex, $email)) {
            $errors['email'] = 'sai định dạng email';
        }
        if ($mat_khau == null) {
            $errors['mat_khau'] = 'Dữ liệu không được để trống';
        }
        if ($re_mat_khau != $mat_khau) {
            $errors['re_mat_khau'] = 'Mật khẩu xác nhận không trùng khớp';
        }

        if (!array_filter($errors)) {
            tk_update($ten_tai_khoan, $ho_ten, $hinh_anh, $email, $trang_thai, $ma_tai_khoan);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/taikhoan/" . $hinh_anh);
            }
            $MESSAGE = "Sửa dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("delete")) {
    try {
        tk_delete($ma_tai_khoan);
        $MESSAGE = 'Xoá thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Xoá thất bại";
    }
    header('location: index.php?msg=' . $MESSAGE);
} else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
