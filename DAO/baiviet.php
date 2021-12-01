<?php
require_once "pdo.php";

// Thêm bài viết
function bv_insert($ten_bai_viet, $hinh_anh, $mo_ta, $chi_tiet){
    $sql = "INSERT INTO bai_viet(ten_bai_viet, hinh_anh, mo_ta, chi_tiet) VALUES(?,?,?,?)";
    pdo_excute($sql,$ten_bai_viet, $hinh_anh, $mo_ta, $chi_tiet);
}

// Sửa bài viết
function bv_update($ten_bai_viet, $hinh_anh, $mo_ta, $chi_tiet,$ma_bai_viet){
    $ngay_sua =  date('Y-m-d H:i:s');
    $sql = "UPDATE bai_viet SET ten_bai_viet=?, hinh_anh=?, mo_ta=?, chi_tiet=?, ngay_sua='$ngay_sua' WHERE ma_bai_viet=?";
    pdo_excute($sql,$ten_bai_viet, $hinh_anh, $mo_ta, $chi_tiet,$ma_bai_viet);
}
// Xoá bài viết
function bv_delete($ma_bai_viet)
{
    $sql = "DELETE FROM bai_viet WHERE ma_bai_viet=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_bai_viet)) {
        foreach ($ma_bai_viet as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_bai_viet);
    }
}

// Chọn tất cả bài viết
function bv_select_All(){
    $sql = "SELECT *FROM bai_viet";
    return pdo_query($sql);
}
function bv_select_All_limit($firstindex,$limit){
    $sql = "SELECT *FROM bai_viet LIMIT $firstindex,$limit";
    return pdo_query($sql);
}
// Truy vấn theo mã bài viết
function bv_select_by_id($ma_bai_viet)
{
    $sql = "SELECT *FROM bai_viet WHERE ma_bai_viet=?";
    return pdo_query_one($sql, $ma_bai_viet);
}
function bv_count(){
    $sql = "SELECT COUNT(ma_bai_viet) as total FROM bai_viet";
    return pdo_query_one($sql);
}
// Truy vấn 8 bài viết mới nhất
function bv_select_limit_8(){
    $sql = "SELECT *FROM bai_viet ORDER BY ma_bai_viet DESC LIMIT 8";
    return pdo_query($sql);
}

function bv_select_limit_5(){
    $sql = "SELECT *FROM bai_viet ORDER BY ma_bai_viet DESC LIMIT 5";
    return pdo_query($sql);
}


