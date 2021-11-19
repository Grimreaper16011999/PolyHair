<?php
require_once "pdo.php";

// Thêm mới
function km_insert($ten_khuyen_mai, $hinh_anh, $gia, $chi_tiet,$so_luong){
    $sql = "INSERT INTO khuyen_mai(ten_khuyen_mai,hinh_anh,gia,chi_tiet, so_luong) VALUES (?,?,?,?,?)";
    pdo_excute($sql,$ten_khuyen_mai, $hinh_anh, $gia, $chi_tiet,$so_luong);
}

function km_update($ten_khuyen_mai, $hinh_anh, $gia, $chi_tiet,$so_luong,$ma_khuyen_mai){
    $sql = "UPDATE khuyen_mai SET ten_khuyen_mai=?,hinh_anh=?,gia=?,chi_tiet=?, so_luong=? WHERE ma_khuyen_mai=?";
    pdo_excute($sql,$ten_khuyen_mai, $hinh_anh, $gia, $chi_tiet,$so_luong,$ma_khuyen_mai);
}

// xoá
function km_delete($ma_khuyen_mai)
{
    $sql = "DELETE FROM khuyen_mai WHERE ma_khuyen_mai=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_khuyen_mai)) {
        foreach ($ma_khuyen_mai as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_khuyen_mai);
    }
}

// Chọn tất cả
function km_select_All(){
    $sql = "SELECT *FROM khuyen_mai";
    return pdo_query($sql);
}
function km_select_All_limit($firstindex,$limit){
    $sql = "SELECT *FROM khuyen_mai LIMIT $firstindex,$limit";
    return pdo_query($sql);
}
// Truy vấn theo mã nhân viên
function km_select_by_id($ma_khuyen_mai)
{
    $sql = "SELECT *FROM khuyen_mai WHERE ma_khuyen_mai=?";
    return pdo_query_one($sql, $ma_khuyen_mai);
}
// Kiểm tra sự tồn tại của loại hàng 
function km_exist($ma_khuyen_mai)
{
    $sql = "SELECT count(*) FROM khuyen_mai WHERE ma_khuyen_mai=?";
    return pdo_query_value($sql, $ma_khuyen_mai) > 0;
}
function km_count(){
    $sql = "SELECT COUNT(ma_khuyen_mai) as total FROM khuyen_mai";
    return pdo_query_one($sql);
}

