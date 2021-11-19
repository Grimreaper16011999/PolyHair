<?php
require "../../global.php";
require "../../DAO/binhluan.php";
require "../../DAO/taikhoan.php";

extract($_REQUEST);
if (exist_param("delete")) {
    try {
        bl_delete($ma_binh_luan);
        $MESSAGE = 'Xoá thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Xoá thất bại";
    }
    header('location: index.php?msg=' . $MESSAGE);
} else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
