<?php
require "../../global.php";
require "../../DAO/nhanvien.php";
require "../../DAO/coso.php";


extract($_REQUEST);

if (exist_param("edit")) {
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
} else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
