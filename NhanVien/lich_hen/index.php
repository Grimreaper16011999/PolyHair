<?php
require "../../global.php";
require "../../DAO/lich_hen.php";
require "../../DAO/taikhoan.php";
require "../../DAO/coso.php";
require "../../DAO/nhanvien.php";
require "../../DAO/khunggio.php";
require "../../DAO/dichvu.php";
require "../../DAO/khuyenmai.php";


extract($_REQUEST);

if (exist_param("delete")) {
    try {
        lich_hen_delete($ma_don);
        $MESSAGE = 'Xoá thành công';
    } catch (Exception $exc) {
        $MESSAGE = "Xoá thất bại";
    }
    header('location: index.php?msg=' . $MESSAGE);
}
elseif(exist_param("edit")){
    $VIEW_NAME = "edit.php";
    if(isset($_POST['btn_edit'])){
        lich_hen_update_status($trang_thai,$_GET['id']);
        $MESSAGE = 'Update thành công';
        header('location: index.php?msg=' . $MESSAGE);
    }
}
elseif(exist_param('now')){
    $VIEW_NAME = 'list_now.php';
}
elseif(exist_param('nextweek')){
    $VIEW_NAME = 'list_next_week.php';
}
else {
    $VIEW_NAME = 'list.php';
}
include_once "../layout.php";
