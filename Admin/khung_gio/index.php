<?php
require "../../global.php";
require "../../DAO/khunggio.php";

extract($_REQUEST);

if (exist_param("add")) {
    $VIEW_NAME = 'add.php';
    if (isset($_POST['reset'])) {
        header('location: index.php?add');
    }
    if (isset($_POST['btn_insert'])) {
        extract($_POST);
        $errors = [
            'thoi_gian' => ''
        ];
        if ($thoi_gian == null) {
            $errors['thoi_gian'] = 'Dữ liệu không được để trống';
        }
        if (!array_filter($errors)) {
            kg_insert($thoi_gian);
            $MESSAGE = "Thêm dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("edit")) {
    $VIEW_NAME = 'edit.php';
    if (isset($_POST['btn_edit'])) {
        extract($_POST);
        $errors = [
            'thoi_gian' => ''
        ];
        if ($thoi_gian == null) {
            $errors['thoi_gian'] = 'Dữ liệu không được để trống';
        }
        if (!array_filter($errors)) {
            kg_update($thoi_gian,$ma_khung_gio);
            $MESSAGE = "Sửa dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("delete")) {
    try {
        kg_delete($ma_khung_gio);
        $MESSAGE = 'Xoá thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Xoá thất bại";
    }
    header('location: index.php?msg=' . $MESSAGE);
} else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
