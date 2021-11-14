<?php
require "pdo.php";
function nv_select_by_macs($ma_co_so)
{
    $sql = "SELECT ten_nhan_vien, ma_nhan_vien FROM nhanvien WHERE nhanvien.ma_co_so=?";
    return pdo_query($sql, $ma_co_so);
}
if (isset($_GET['ma_co_so'])) {
    $ma_cs = $_GET['ma_co_so'];
    $rs = nv_select_by_macs($ma_cs);
    echo json_encode($rs);
}
