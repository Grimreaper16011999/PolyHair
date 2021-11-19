<?php
require_once "pdo.php";

// Thêm mới dịch vụ
function dv_insert($ten_dich_vu, $hinh_anh, $gia, $chi_tiet){
    $sql = "INSERT INTO dich_vu(ten_dich_vu,hinh_anh,gia,chi_tiet) VALUES (?,?,?,?)";
    pdo_excute($sql,$ten_dich_vu, $hinh_anh, $gia, $chi_tiet);
}

// dv_insert('dv 2', 'dichvu.jpg',50000,'chi tiết dịch vu 2');
// dv_insert('dv 3', 'dichvu.jpg',120000,'chi tiết dịch vu 3');
// dv_insert('dv 4', 'dichvu.jpg',340000,'chi tiết dịch vu 4');

// Update dịch vụ
function dv_update($ten_dich_vu, $hinh_anh, $gia, $chi_tiet,$ma_dich_vu){
    $sql = "UPDATE dich_vu SET ten_dich_vu=?, hinh_anh=?, gia=?, chi_tiet=? WHERE ma_dich_vu=?";
    pdo_excute($sql,$ten_dich_vu, $hinh_anh, $gia, $chi_tiet,$ma_dich_vu);
}

// Xoá dịch vụ
function dv_delete($ma_dich_vu)
{
    $sql = "DELETE FROM dich_vu WHERE ma_dich_vu =?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_dich_vu)) {
        foreach ($ma_dich_vu as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_dich_vu);
    }
}

//Chọn tất cả dịch vụ
function dv_select_All(){
    $sql = "SELECT *FROM dich_vu";
    return pdo_query($sql);
}

function dv_select_All_limit($firstindex,$limit){
    $sql = "SELECT *FROM dich_vu LIMIT $firstindex,$limit";
    return pdo_query($sql);
}
// Truy vấn theo mã dịch vụ
function dv_select_by_id($ma_dich_vu)
{
    $sql = "SELECT *FROM dich_vu WHERE ma_dich_vu=?";
    return pdo_query_one($sql, $ma_dich_vu);
}
function dv_count(){
    $sql = "SELECT COUNT(ma_dich_vu) as total FROM dich_vu";
    return pdo_query_one($sql);
}
