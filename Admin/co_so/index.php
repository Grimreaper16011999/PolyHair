<?php
require "../../global.php";
require "../../DAO/coso.php";

extract($_REQUEST);

if (exist_param("add")) {
    $VIEW_NAME = 'add.php';
    if (isset($_POST['reset'])) {
        header('location: index.php?add');
    }
    if (isset($_POST['btn_insert'])) {
        extract($_POST);
        $errors = [
            'ten_so_so' => '',
            'dia_chi' => '',
            'so_dien_thoai' => '',
            'url' => ''
        ];
        if ($ten_co_so == null) {
            $errors['ten_co_so'] = 'Dữ liệu không được để trống';
        }
        if ($dia_chi == null) {
            $errors['dia_chi'] = 'Dữ liệu không được để trống';
        }
        if (!preg_match( '/^(09|03|07|08|05)+([0-9]{8})$/', $so_dien_thoai )) {
            $errors['so_dien_thoai'] = 'Số điện thoại không hợp lệ';
        }
        if ($so_dien_thoai == null) {
            $errors['so_dien_thoai'] = 'Dữ liệu không được để trống';
        }
        if ($url == null) {
            $errors['url'] = 'Dữ liệu không được để trống';
        }
        if (!array_filter($errors)) {
            coso_insert($ten_co_so, $dia_chi, $so_dien_thoai, $url);
            $MESSAGE = "Thêm dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("edit")) {
    $VIEW_NAME = 'edit.php';
    if (isset($_POST['btn_edit'])) {
        extract($_POST);
        $errors = [
            'ten_so_so' => '',
            'dia_chi' => '',
            'so_dien_thoai' => '',
            'url' => ''
        ];
        if ($ten_co_so == null) {
            $errors['ten_co_so'] = 'Dữ liệu không được để trống';
        }
        if ($dia_chi == null) {
            $errors['dia_chi'] = 'Dữ liệu không được để trống';
        }
        if (!preg_match( '/^(09|03|07|08|05)+([0-9]{8})$/', $so_dien_thoai )) {
            $errors['so_dien_thoai'] = 'Số điện thoại không hợp lệ';
        }
        if ($so_dien_thoai == null) {
            $errors['so_dien_thoai'] = 'Dữ liệu không được để trống';
        }
        if ($url == null) {
            $errors['url'] = 'Dữ liệu không được để trống';
        }
        if (!array_filter($errors)) {
            coso_update($ten_co_so, $dia_chi, $so_dien_thoai, $url, $ma_co_so);
            $MESSAGE = "Sửa dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("delete")) {
    try {
        coso_delete($ma_co_so);
        $MESSAGE = 'Xoá thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Xoá thất bại";
    }
    header('location: index.php?msg=' . $MESSAGE);
} else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
