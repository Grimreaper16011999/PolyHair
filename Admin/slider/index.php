<?php
require "../../global.php";
require "../../DAO/slider.php";

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
            'hinh_anh' => '',
            'tieu_de' => '',
            'noi_dung' => ''
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
            $hinh_anh = '1.png';
        }
        if($tieu_de == null){
            $errors['tieu_de'] = "Tiêu đề không để trống";
        }
        if($noi_dung == null){
            $errors['noi_dung'] = "Nội dung không để trống";
        }

        if (!array_filter($errors)) {
            slider_insert($hinh_anh, $tieu_de, $noi_dung, $trang_thai);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/slider/" . $hinh_anh);
            }
            $MESSAGE = "Thêm dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("edit")) {
    $VIEW_NAME = 'edit.php';
    $slider = slider_select_by_id($_GET['id']);
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
            $hinh_anh = $slider['hinh_anh'];
        }
        if($tieu_de == null){
            $errors['tieu_de'] = "Tiêu đề không để trống";
        }
        if($noi_dung == null){
            $errors['noi_dung'] = "Nội dung không để trống";
        }
        

        if (!array_filter($errors)) {
           slider_update($hinh_anh, $tieu_de, $noi_dung, $trang_thai, $ma_anh);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../../resources/img/slider/" . $hinh_anh);
            }
            $MESSAGE = "Sửa dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("delete")) {
    try {
        slider_delete($ma_anh);
        $MESSAGE = 'Xoá thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Xoá thất bại";
    }
    header('location: index.php?msg=' . $MESSAGE);
} else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
