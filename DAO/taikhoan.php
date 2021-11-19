<?php
require_once "pdo.php";

// Thêm tài khoản
function tk_insert($ten_tai_khoan,$ho_ten, $hinh_anh, $mat_khau, $email, $trang_thai, $vai_tro){
    $sql = "INSERT INTO tai_khoan(ten_tai_khoan,ho_ten, hinh_anh, mat_khau, email, trang_thai, vai_tro) VALUES(?,?,?,?,?,?,?)";
    pdo_excute($sql,$ten_tai_khoan,$ho_ten, $hinh_anh, $mat_khau, $email, $trang_thai, $vai_tro);
}


// Update tài khoản
function tk_update($ten_tai_khoan,$ho_ten, $hinh_anh, $email, $trang_thai, $vai_tro,$ma_tai_khoan){
    $sql = "UPDATE tai_khoan SET ten_tai_khoan=?, ho_ten=?, hinh_anh=?, email=?, trang_thai=?, vai_tro=?  WHERE ma_tai_khoan=?";
    pdo_excute($sql,$ten_tai_khoan,$ho_ten, $hinh_anh, $email, $trang_thai, $vai_tro,$ma_tai_khoan);
}

// Xoá tài khoản
function tk_delete($ma_tai_khoan)
{
    $sql = "DELETE FROM tai_khoan WHERE ma_tai_khoan=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_tai_khoan)) {
        foreach ($ma_tai_khoan as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_tai_khoan);
    }
}

function tk_select_All(){
    $sql = "SELECT *FROM tai_khoan ORDER BY vai_tro";
    return pdo_query($sql);
}
function tk_select_All_limit($firstindex,$limit){
    $sql = "SELECT *FROM tai_khoan ORDER BY vai_tro LIMIT $firstindex,$limit ";
    return pdo_query($sql);
}
// Truy vấn theo mã nhân viên
function tk_select_by_id($ma_tai_khoan)
{
    $sql = "SELECT *FROM tai_khoan WHERE ma_tai_khoan=?";
    return pdo_query_one($sql, $ma_tai_khoan);
}
function tk_count(){
    $sql = "SELECT COUNT(ma_tai_khoan) as total FROM tai_khoan";
    return pdo_query_one($sql);
}

