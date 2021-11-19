<?php
require_once "pdo.php";

// Thêm sản phẩm
function sp_insert($ten_san_pham, $hinh_anh, $gia, $chi_tiet){
    $sql = "INSERT INTO san_pham(ten_san_pham,hinh_anh,gia,chi_tiet) VALUES(?,?,?,?)";
    pdo_excute($sql,$ten_san_pham, $hinh_anh, $gia, $chi_tiet);
}
// Sửa
function sp_update($ten_san_pham, $hinh_anh, $gia, $chi_tiet, $ma_san_pham){
    $sql = "UPDATE san_pham SET ten_san_pham=?, hinh_anh=?, gia=?, chi_tiet=? WHERE ma_san_pham=?";
    pdo_excute($sql,$ten_san_pham, $hinh_anh, $gia, $chi_tiet,$ma_san_pham); 
}

// Xoá

function sp_delete($ma_san_pham)
{
    $sql = "DELETE FROM san_pham WHERE ma_san_pham=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_san_pham)) {
        foreach ($ma_san_pham as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_san_pham);
    }
}

// Chọn tất cả 
function sp_select_All(){
    $sql = "SELECT *FROM san_pham";
    return pdo_query($sql);
}
function sp_select_All_limit($firstindex,$limit){
    $sql = "SELECT *FROM san_pham LIMIT $firstindex,$limit";
    return pdo_query($sql);
}
// Truy vấn theo mã 
function sp_select_by_id($ma_san_pham)
{
    $sql = "SELECT *FROM san_pham WHERE ma_san_pham=?";
    return pdo_query_one($sql, $ma_san_pham);
}
function sp_count(){
    $sql = "SELECT COUNT(ma_san_pham) as total FROM san_pham";
    return pdo_query_one($sql);
}



