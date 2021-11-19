<?php
require_once "pdo.php";
function bl_insert($noi_dung,$ma_tai_khoan){
    $sql = "INSERT INTO binh_luan(noi_dung,ma_tai_khoan) VALUES (?,?)";
    pdo_excute($sql,$noi_dung,$ma_tai_khoan);
}



function bl_update($noi_dung,$ma_tai_khoan,$ma_binh_luan){
    $sql = "UPDATE binh_luan SET noi_dung=?,ma_tai_khoan=? WHERE ma_binh_luan=?";
    pdo_excute($sql,$noi_dung,$ma_tai_khoan,$ma_binh_luan);
}

// Xoá
function bl_delete($ma_binh_luan)
{
    $sql = "DELETE FROM binh_luan WHERE ma_binh_luan =?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_binh_luan)) {
        foreach ($ma_binh_luan as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_binh_luan);
    }
}

//Chọn tất cả
function bl_select_All(){
    $sql = "SELECT *FROM binh_luan";
    return pdo_query($sql);
}

function bl_select_All_limit($firstindex,$limit){
    $sql = "SELECT *FROM binh_luan LIMIT $firstindex,$limit";
    return pdo_query($sql);
}
// Truy vấn theo mã
function bl_select_by_id($ma_binh_luan)
{
    $sql = "SELECT *FROM binh_luan WHERE ma_binh_luan=?";
    return pdo_query_one($sql, $ma_binh_luan);
}
function bl_count(){
    $sql = "SELECT COUNT(ma_binh_luan) as total FROM binh_luan";
    return pdo_query_one($sql);
}
