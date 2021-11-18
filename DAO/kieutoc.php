<?php
require_once "pdo.php";

// Thêm kiểu tóc 
function kt_insert($ten_kieu_toc, $hinh_anh, $mo_ta, $chi_tiet)
{
    $sql = "INSERT INTO kieu_toc(ten_kieu_toc, hinh_anh,mo_ta, chi_tiet) VALUES (?,?,?,?)";
    pdo_excute($sql, $ten_kieu_toc, $hinh_anh, $mo_ta, $chi_tiet);
}



// Sủa kiểu tóc 
function kt_update($ten_kieu_toc, $hinh_anh, $mo_ta, $chi_tiet, $ma_kieu_toc)
{
    $sql = "UPDATE kieu_toc SET ten_kieu_toc=?, hinh_anh=?,mo_ta=?, chi_tiet=? WHERE ma_kieu_toc=?";
    pdo_excute($sql, $ten_kieu_toc, $hinh_anh, $mo_ta, $chi_tiet, $ma_kieu_toc);
}

// Xoá kiểu tóc
function kt_delete($ma_kieu_toc)
{
    $sql = "DELETE FROM kieu_toc WHERE ma_kieu_toc=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_kieu_toc)) {
        foreach ($ma_kieu_toc as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_kieu_toc);
    }
}

// Chọn tất cả kiểu tóc
function kt_select_All(){
    $sql = "SELECT *FROM kieu_toc";
    return pdo_query($sql);
}
function kt_select_All_limit($firstindex,$limit){
    $sql = "SELECT *FROM kieu_toc LIMIT $firstindex,$limit";
    return pdo_query($sql);
}
// Truy vấn theo mã kiểu tóc
function kt_select_by_id($ma_kieu_toc)
{
    $sql = "SELECT *FROM kieu_toc WHERE ma_kieu_toc=?";
    return pdo_query_one($sql, $ma_kieu_toc);
}
