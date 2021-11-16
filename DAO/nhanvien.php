<?php
require_once "pdo.php";

// Thêm mới nhân viên
function nv_insert($ten_nhan_vien, $hinh_anh, $thong_tin, $trang_thai, $ma_co_so){
    $sql = "INSERT INTO nhan_vien(ten_nhan_vien, hinh_anh, thong_tin, trang_thai, ma_co_so) VALUES(?,?,?,?,?)";
    pdo_excute($sql,$ten_nhan_vien, $hinh_anh, $thong_tin, $trang_thai, $ma_co_so);
}

// Sửa thông tin nhân viên
function nv_update($ten_nhan_vien, $hinh_anh, $thong_tin, $trang_thai, $ma_co_so, $ma_nhan_vien){
    $sql = "UPDATE nhan_vien SET ten_nhan_vien=?, hinh_anh=?, thong_tin=?, trang_thai=?, ma_co_so=? WHERE ma_nhan_vien=?";
    pdo_excute($sql,$ten_nhan_vien, $hinh_anh, $thong_tin, $trang_thai, $ma_co_so,$ma_nhan_vien);
}
// xoá
function nv_delete($ma_nhan_vien)
{
    $sql = "DELETE FROM co_so WHERE ma$ma_nhan_vien=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_nhan_vien)) {
        foreach ($ma_nhan_vien as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_nhan_vien);
    }
}

// Chọn tất cả
function nv_select_All(){
    $sql = "SELECT *FROM nhan_vien";
    return pdo_query($sql);
}
function nv_select_All_limit($firstindex,$limit){
    $sql = "SELECT *FROM nhan_vien LIMIT $firstindex,$limit";
    return pdo_query($sql);
}
// Truy vấn theo mã nhân viên
function nv_select_by_id($ma_nhan_vien)
{
    $sql = "SELECT *FROM co_so WHERE ma$ma_nhan_vien=?";
    return pdo_query_one($sql, $ma_nhan_vien);
}


function nv_select_by_macs($ma_co_so)
{
    $sql = "SELECT ten_nhan_vien, ma_nhan_vien FROM nhan_vien WHERE nhan_vien.ma_co_so=?";
    return pdo_query($sql, $ma_co_so);
}
if (isset($_GET['ma_co_so'])) {
    $ma_cs = $_GET['ma_co_so'];
    $rs = nv_select_by_macs($ma_cs);
    echo json_encode($rs);
}
